var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');

http.listen(3000, function(){
    console.log('Listening on Port 3000');
});

var redis = new Redis();

redis.psubscribe('*', function(err, count) {

});

redis.on('pmessage', function(subscribed,channel, message) {

    console.log('Message Recieved at channel(' + channel + '): ' + message);

    message = JSON.parse(message);

    io.emit(channel, message.data);
});
