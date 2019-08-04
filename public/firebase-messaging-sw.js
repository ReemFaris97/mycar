// Import and configure the Firebase SDK
// These scripts are made available when the app is served or deployed on Firebase Hosting
// If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup
importScripts('https://www.gstatic.com/firebasejs/5.9.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.9.1/firebase-messaging.js');
// importScripts('https://www.gstatic.com/firebasejs/5.8.4/init.js');

// Initialize Firebase
var config = {
    apiKey: "AIzaSyCBp7tT_DxP3kyenx4vx5C9f51WBUPewXM",
    authDomain: "panorama-task-manager.firebaseapp.com",
    databaseURL: "https://panorama-task-manager.firebaseio.com",
    projectId: "panorama-task-manager",
    storageBucket: "panorama-task-manager.appspot.com",
    messagingSenderId: "83853884207",
    appId: "1:83853884207:web:b69a67025f896883"
};
firebase.initializeApp(config);

var messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    var notificationTitle =payload.data.title;
    var notificationOptions = {
        body: payload.data.body,
        icon:  payload.data.icon,
        image: payload.data.image,
        data:{
            time: Date(Date.now()).toString(),
            click_action:payload.data.click_action
        }
    };



    return self.registration.showNotification(notificationTitle,
        notificationOptions);
});


self.addEventListener('notificationclick', function(event) {
    var action_click = event.notification.data.click_action;
//  event.notification.close();

    // Do something as the result of the notification click
//  const promiseChain = doSomething();
    event.waitUntil(
        clients.openWindow(action_click)
    );
});
