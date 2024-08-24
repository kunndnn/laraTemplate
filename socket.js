const { Server } = require("socket.io");
const { createConnection } = require("mysql");
const { promisify } = require("util");
const fs = require("fs");
const path = require("path");

// DB connection
const con = createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "test",
    charset: "utf8mb4",
});

con.connect((err) => {
    if (err) {
        console.error("error connecting: " + err.stack);
        return;
    }
    console.log("connected as id " + con.threadId);
});
const query = promisify(con.query).bind(con);
//DB connection end
// changes
// socket io instance
const io = new Server({
    /* options */
    cors: {
        origin: "http://127.0.0.1:8000",
        // origin: "*",
    },
});

function saveFileFromBase64(base64String, filePath) {
    // Extract the file extension from the Base64 string (if it contains data URI prefix)
    const matches = base64String.match(/^data:(.+);base64,(.+)$/);

    let extension = "";
    let data = base64String;

    if (matches) {
        const mimeType = matches[1]; // e.g., 'image/png'
        extension = mimeType.split("/")[1]; // Extract 'png'
        data = matches[2]; // The actual Base64 string data
    }

    // If extension couldn't be determined, default to 'bin'
    if (!extension) {
        extension = "bin";
    }

    // Generate a unique file name
    const fileName = `file_${Date.now()}.${extension}`;
    const fullPath = path.join(filePath, fileName);

    // Decode the Base64 string into a Buffer
    const buffer = Buffer.from(data, "base64");

    // Write the file to the given path
    fs.writeFileSync(fullPath, buffer); // Synchronous to ensure file is written before proceeding
    console.log("File saved:", fullPath);

    return fileName;
}

io.on("connection", async (socket) => {
    // ...

    socket.on("usersListing", async (body) => {
        const { userId } = body;
        const [users, newUsers] = await Promise.all([
            query(
                `select chats.id as chatId, rooms.id as roomId, users.id, users.first_name, users.last_name, chats.created_at,
                (select message from chats where chats.roomId=rooms.id order by chats.id desc limit 1) as lastMsg
                from chat_rooms as rooms
                left join users on rooms.senderId=users.id or rooms.receiverId=users.id
                left join chats on chats.roomId =rooms.id
                where (rooms.senderId=? or rooms.receiverId=?) and (users.id !=?)
                group by users.id
                order by created_at`,
                [userId, userId, userId]
            ),
            query(
                `SELECT u.id 
                    FROM users u
                    WHERE u.id != ?
                    AND u.id NOT IN (
                        SELECT r.receiverId 
                        FROM chat_rooms r
                        WHERE r.senderId = ?
                        UNION
                        SELECT r.senderId 
                        FROM chat_rooms r
                        WHERE r.receiverId = ?)`,
                [userId, userId, userId]
            ),
        ]);
        console.log({ users });
        const result = {
            status: true,
            message: "users listing",
            data: { users, newUsers },
        };
        socket.emit("usersListing", result);
    });

    socket.on("joinRoom", async (body) => {
        const { senderId, receiverId } = body;
        let roomId;
        const roomFound = await query(
            `select * from chat_rooms where (senderId=? and receiverId=?) or (senderId=? and receiverId=?)`,
            [senderId, receiverId, receiverId, senderId]
        ).then((data) => data[0]);

        if (roomFound) {
            roomId = roomFound.id;
        } else {
            const createRoom = await query(
                `insert into chat_rooms (senderId, receiverId) values(?,?)`,
                [senderId, receiverId]
            );
            roomId = createRoom.insertId;
        }

        const limit = 2;
        const page = body.page || 1;
        const skip = limit * page;

        const [chats, count] = await Promise.all([
            query(
                `select * from chats where roomId=?
            order by id desc limit ? offset ?`,
                [roomId, limit, skip]
            ),
            query(`select count(*) as count from chats where roomId=?`, [
                roomId,
            ]).then((data) => data[0]),
        ]);

        console.log({ count, roomId });
        roomId = Number(roomId);
        //join room
        socket.join(roomId);
        const result = {
            status: true,
            message: "room joined",
            data: { chats, roomId },
        };

        io.to(roomId).emit("joinRoom", result);
    });

    socket.on("msg", async (body) => {
        let { roomId, senderId, message, attachment, messageType } = body;
        // console.log({ attachment, messageType });

        if (attachment) {
            const filePath = path.join(__dirname, "public/uploads"); // Directory to save the file
            const fileName = saveFileFromBase64(attachment, filePath);
            // console.log({ fileName });
            attachment = fileName;
        }

        const { insertId } = await query(
                `insert into chats(roomId,senderId, message, attachment, messageType)values(?,?,?,?,?)`,
                [roomId, senderId, message, attachment, messageType]
            ),
            messages = await query(`select * from chats where id=? limit 1`, [
                insertId,
            ]).then((data) => data[0]);

        roomId = Number(roomId);
        //join room
        socket.join(roomId);

        const result = {
            status: true,
            message: "msg sent",
            data: messages,
        };
        console.log({ messages });
        io.to(roomId).emit("msg", result);
    });

    socket.on("disconnect", async (body) => {
        const { userId } = body;
        console.log(socket.id, "user disconnected");
    });
});
io.listen(3000);
