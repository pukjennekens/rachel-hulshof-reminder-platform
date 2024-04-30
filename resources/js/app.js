import "./bootstrap";
import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import { initializeApp } from "firebase/app";
import { getMessaging, getToken, onMessage } from "firebase/messaging";
import axios from "axios";

axios.defaults.headers.common["X-CSRF-TOKEN"] = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

Alpine.store("global", {
    notificationsDrawerOpen: false,
    requestNotificationPermission() {
        requestPermission();
    },
    notification: {
        title: "",
        body: "",
        show: false,
    },
    notificationsMessage: {
        show: false,
    },
});

Livewire.start();

const app = initializeApp({
    apiKey: "AIzaSyD7BqYYPiGw-rOuTpB0mRn6y_7x6FKJ-XI",
    authDomain: "rachel-hulshof.firebaseapp.com",
    projectId: "rachel-hulshof",
    storageBucket: "rachel-hulshof.appspot.com",
    messagingSenderId: "324732111099",
    appId: "1:324732111099:web:6ae241d6dbe33aae16485e",
});

const messaging = getMessaging(app);

const requestPermission = () => {
    if (window.Notification.permission === "granted") {
        setToken();
    } else {
        Alpine.store("global").notificationsMessage = { show: true };

        window.Notification.requestPermission((value) => {
            if (value == "granted") setToken();
        });
    }
};

const setToken = async () => {
    Alpine.store("global").notificationsMessage = { show: false };

    getToken(messaging, {
        vapidKey:
            "BFYOLtctynyZkq1RPBmIRjg81fqTGnYbLiGSLa381WMDzLt0duFuY7C0Z1_5ED-DpOP_KuYh2-DmmhLbuNGQZFw",
    })
        .then((currentToken) => {
            if (currentToken) {
                console.log("Token: ", currentToken);
                if (localStorage.getItem("token") !== currentToken)
                    axios.post("/fcm-token", {
                        token: currentToken,
                    });

                localStorage.setItem("token", currentToken);
            } else {
                Alpine.store("global").notificationsMessage = { show: true };
            }
        })
        .catch((err) => {
            console.log("An error occurred while retrieving token. ", err);
        });
};

onMessage(messaging, (payload) => {
    Alpine.store("global").notification = {
        title: payload.notification.title,
        body: payload.notification.body,
        show: true,
    };
});

requestPermission();
