// firebase-messaging-sw.js
importScripts("https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js");
importScripts(
    "https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js"
);

firebase.initializeApp({
    apiKey: "AIzaSyD7BqYYPiGw-rOuTpB0mRn6y_7x6FKJ-XI",
    authDomain: "rachel-hulshof.firebaseapp.com",
    projectId: "rachel-hulshof",
    storageBucket: "rachel-hulshof.appspot.com",
    messagingSenderId: "324732111099",
    appId: "1:324732111099:web:6ae241d6dbe33aae16485e",
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage((payload) => {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload
    );
    // Customize notification here
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/firebase-logo.png",
    };

    self.registration.showNotification(notificationTitle, notificationOptions);
});
