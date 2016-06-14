var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

io.on('connection', function (socket) {
    socket.on('hello', function () {
        console.log("HelloWorld!");
    });
});

http.listen('3000', function(){
    console.log('Lisening on port 3000');
});
