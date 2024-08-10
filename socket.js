const { Server } = require("socket.io");
const { createConnection } = require("mysql");
const { promisify } = require("util");

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

io.on("connection", async (socket) => {
    // ...

    socket.on("usersListing", async (body) => {
        const { userId } = body;
        console.log({ userId });
        const [users, newUsers] = await Promise.all([
            query(
                `select chats.id as chatId, rooms.id as roomId, users.id, users.first_name, users.last_name,
                (select message from chats where chats.roomId=rooms.id order by chats.id desc limit 1) as lastMsg
                from chat_rooms as rooms
                left join users on rooms.senderId=users.id or rooms.receiverId=users.id
                left join chats on chats.roomId =rooms.id
                where (rooms.senderId=? or rooms.receiverId=?) and (users.id !=?)
                group by users.id
                order by chatId desc`,
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

        const chats = await query(
            `select * from chats where roomId=?
            order by id desc`,
            [roomId]
        );

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
        let { roomId, senderId, message } = body;

        const { insertId } = await query(
                `insert into chats(roomId,senderId, message)values(?,?,?)`,
                [roomId, senderId, message]
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

        io.to(roomId).emit("msg", result);
    });

    socket.on("disconnect", async (body) => {
        const { userId } = body;
        console.log(socket.id, "user disconnected");
    });
});
io.listen(3000);
