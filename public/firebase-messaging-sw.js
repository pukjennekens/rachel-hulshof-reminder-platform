// firebase-messaging-sw.js
importScripts(
    "https://www.gstatic.com/firebasejs/9.0.2/firebase-app-compat.js"
);
importScripts(
    "https://www.gstatic.com/firebasejs/9.0.2/firebase-messaging-compat.js"
);

const firebaseConfig = {
    apiKey: "AIzaSyD7BqYYPiGw-rOuTpB0mRn6y_7x6FKJ-XI",
    authDomain: "rachel-hulshof.firebaseapp.com",
    projectId: "rachel-hulshof",
    storageBucket: "rachel-hulshof.appspot.com",
    messagingSenderId: "324732111099",
    appId: "1:324732111099:web:6ae241d6dbe33aae16485e",
};

firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

messaging.onBackgroundMessage((payload) => {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload
    );

    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
        icon: payload.notification.icon,
    };

    console.log(notificationTitle, notificationOptions);

    // self.registration.showNotification(notificationTitle, notificationOptions);
});
