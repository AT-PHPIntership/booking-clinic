

module.exports = function (app, server, redis) {
    var io = require('socket.io').listen(server);
    io.sockets.on('connection', function (socket) {
        var redisClient = redis.createClient();
          redisClient.subscribe('message');

          redisClient.on("message", function(channel, message) {
            console.log("mew message in queue "+ message + "channel");
            socket.emit(channel, message);
          });
    });
};