@extends('layouts.app')

@section('htmlheader_title')
    Send Push Notify
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">


                <div id="app">

                    <h1>Push Notification in App Android with OneSignal</h1>

                    <div class="box box-primary direct-chat direct-chat-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Send Notification</h3>

                            <div class="box-tools pull-right">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">@{{total}}</span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg" v-for="notification in notifications">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left">Push Woosh</span>
                                        <span class="direct-chat-timestamp pull-right">@{{notification.date}}</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="{{asset('/img/user2-160x160.jpg')}}" alt="Message User Image"><!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        @{{notification.message}}
                                        <span class="pull-right">
                <button v-on:click="removeNotification(notification)" type="button" class="btn btn-box-tool"><i class="fa fa-minus"></i>
                </button>
              </span>
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- /.direct-chat-msg -->
                            </div>

                            <!--/.direct-chat-messages-->

                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="input-group">
                                <input id="notificationMessage" type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button v-on:click="notify" type="button" class="btn btn-primary btn-flat">Send</button>
                        <button v-on:click="clear" type="button" class="btn btn-danger btn-flat">Clear</button>
                      </span>
                            </div>
                        </div>
                        <!-- /.box-footer-->
                    </div>

                    <!--<h2>Notifications: @{{notifications | json}}</h2>-->

                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/vue/latest/vue.js"></script>
    <script>
        (function (exports) {
            'use strict';
            var STORAGE_KEY = 'PUSHWOOSH_NOTIFICATIONS';
            exports.notificationsStorage = {
                fetch: function () {
                    return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
                },
                save: function (notifications) {
                    localStorage.setItem(STORAGE_KEY, JSON.stringify(notifications));
                }
            };
        })(window);
    </script>
    <script>
        new Vue({
            el: 'body',
            components: { app },
            data: function() {
                return {
                    // note: changing this line won't causes changes
                    // with hot-reload because the reloaded component
                    // preserves its current state and we are modifying
                    // its initial state.
                    notification_message: "Notificació per defecte!",
                    notifications: notificationsStorage.fetch()
                }
            },
            computed: {
                total: function () {
                    return this.notifications.length;
                }
            },
            watch: {
                notifications: {
                    handler: function (notifications) {
                        notificationsStorage.save(notifications);
                    },
                    deep: true
                }
            },
            methods: {
                clear: function () {
                    this.notifications = [];
                    notificationsStorage.save([]);
                },
                removeNotification: function (notification) {
                    this.notifications.$remove(notification);
                },
                notify: function () {
                    console.debug("Click OK!");
                    this.notifications.push({message: $('#notificationMessage').val(), date: new Date().toLocaleString()});
                    this.notification_message = $('#notificationMessage').val();
                    this.notifyAjax();
                },
                notifyAjax: function () {
                    $.ajax({
                        type: "POST",
                        url: "https://onesignal.com/api/v1/notifications?app_id=c1351af4-40be-4c75-b7ee-0afe4fdce5ac",
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('Authorization', 'Basic NDZjNjVmZjItZDhjZi00ZDIzLTg1MmYtMmU0Yzg1YTc5Yzg3'),
                                    xhr.setRequestHeader('Content-Type', 'application/json')
                        },
                        data: JSON.stringify({
                            "app_id": "c1351af4-40be-4c75-b7ee-0afe4fdce5ac",
                            "included_segments": ["All"],
                            "data": {"foo": "bar"},
                            "content_available":true,
                            "contents": {"en": this.notification_message,"es": this.notification_message},
                            "headings": {"en": this.notification_message,"es": this.notification_message},
                            "isAndroid": true,
                            "android_sound": "notification",
                            "android_led_color": "FF0000FF",
                            "android_visibility": 1
                        }),
                    }).done(function (data) {
                        console.log(data);
                        $('#notificationMessage').val('');
                    });
                },
            }
        })
    </script>
@endsection