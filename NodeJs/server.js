// var app = require('express')();
// var server = require('http').Server(app);
// var io = require('socket.io')(server);

// server.listen(8890);
// io.on('connection', function (socket) {

//   console.log("new client connected");
//   var redisClient = redis.createClient();
//   redisClient.subscribe('message');

//   redisClient.on("message", function(channel, message) {
//     console.log("mew message in queue "+ message + "channel");
//     socket.emit(channel, message);
//   });

//   socket.on('disconnect', function() {
//     redisClient.quit();
//   });

// });

var redis = require('redis');
var http = require('http');
var express = require('express');
var app = express();

var server = http.createServer(app);

require('./real_time')(app, server, redis);

server.listen(3000, function () {
 console.log('Express server listening on port 3000');
})