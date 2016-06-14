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
Pusher.log = function(message) {
    if (window.console && window.console.log) {
        window.console.log(message);
    }
};
var pusher = new Pusher('928577ad9983004c8a77', {
    encrypted: true
});

var channel = pusher.subscribe('shotout-added');
channel.bind("App\\Events\\ShotoutAdded", notifyUser);

//# sourceMappingURL=all.js.map
