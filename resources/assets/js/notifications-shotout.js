var notifyUser = function (data) {
    if (!('Notification' in window)) {
        alert('Web Notification is not supported');
        return;
    }
    window.console.log(data);
    Notification.requestPermission(function(permission){
        var notification = new Notification(data.shotout.user.email +' said:', {
            body: data.shotout.message,
            icon: data.shotout.user.avatar
        });
    });
};

var socket = io('http://mysaas.app:3000');
socket.on('shotout-added', function(msg){
    notifyUser(msg);
});