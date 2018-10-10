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
var sleep = require('sleep');


var server = http.createServer(app);

// require('./real_time')(app, server, redis);

server.listen(3000, function () {
 console.log('Express server listening on port 3000');
});
var io = require('socket.io').listen(server);
  io.on('connection', function (socket) {
    console.log('client connect');
    socket.on('rooms', function(rooms) {
      console.log('connect to rooms');
      let item;
      for (item of rooms) {
        console.log(item);
        socket.join(item);
      }
    });

    var redisClient = redis.createClient();
    redisClient.subscribe('message');

    redisClient.on("message", function(channel, message) {
      message = JSON.parse(message);

      // sleep.sleep(10);
      // console.log('-> ', message.channel, message.data);
      socket.in(message.channel).emit('message', message.data);
    });
    // end connect
    socket.on('disconnect', function() {
      console.log('client disconnect');
      redisClient.quit();
    });
});
