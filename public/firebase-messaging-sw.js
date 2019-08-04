// Import and configure the Firebase SDK
// These scripts are made available when the app is served or deployed on Firebase Hosting
// If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup
importScripts('https://www.gstatic.com/firebasejs/5.9.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.9.1/firebase-messaging.js');
// importScripts('https://www.gstatic.com/firebasejs/5.8.4/init.js');

// Initialize Firebase
var config = {
    apiKey: "AIzaSyDYkaLf81OdUKQrb5ASJMfLRAo-zZGbhTQ",
    authDomain: "mycar-part.firebaseapp.com",
    databaseURL: "https://mycar-part.firebaseio.com",
    projectId: "mycar-part",
    storageBucket: "",
    messagingSenderId: "439752799792",
    appId: "1:439752799792:web:252944a701d8d363"
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
