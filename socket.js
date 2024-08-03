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
        const [users, newUsers] = await Promise.all([
            query(
                `SELECT room.id as roomId, users.*,
                (select message from chats where chats.roomId=room.id order by id desc limit 1) as latestMessage
                 FROM chat_rooms AS room
                 LEFT JOIN users ON room.senderId = users.id OR room.receiverId = users.id
                 WHERE room.senderId = ? OR room.receiverId = ?
                 group by room.id, users.id`,
                [userId, userId]
            ),
            query(`select * from users`),
        ]);
        // const users = await query(
        //     `SELECT room.id as roomId, users.*,
        //     (select message from chats where chats.roomId=room.id order by id desc limit 1) as latestMessage
        //     ,
        //      FROM chatrooms AS room
        //      LEFT JOIN users ON room.senderId = users.id OR room.receiverId = users.id
        //      WHERE room.senderId = ? OR room.receiverId = ?
        //      group by users.id, users.id`,
        //     [body.userId, body.userId]
        // );

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
            `select * from chatrooms where (senderId=? and receiverId=?) or (senderId=? and receiverId=?)`,
            [senderId, receiverId, receiverId, senderId]
        ).then((data) => data[0]);

        if (roomFound) {
            roomId = roomFound.id;
        } else {
            const createRoom = await query(
                `insert into chatrooms (senderId, receiverId) values(?,?)`,
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
