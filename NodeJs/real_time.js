

module.exports = function (app, server, redis) {
    var io = require('socket.io').listen(server);
    io.sockets.on('connection', function (socket) {
        var redisClient = redis.createClient();
          redisClient.subscribe('message');

          redisClient.on("EURJPY", function(channel, message) {
            console.log("mew message in queue "+ message + channel);
            socket.emit(channel, message);
          });
          redisClient.on("JPYEUR", function(channel, message) {
            console.log("mew message in queue "+ message + channel);
            socket.emit(channel, message);
          });
          // end connect
          socket.on('disconnect', function() {
            redisClient.quit();
          });
    });
};