import "./bootstrap";
import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import { initializeApp } from "firebase/app";
import { getMessaging, getToken } from "firebase/messaging";

Alpine.store("global", {
    notificationsDrawerOpen: false,
});

Livewire.start();

const firebaseConfig = {
    apiKey: "AIzaSyD7BqYYPiGw-rOuTpB0mRn6y_7x6FKJ-XI",
    authDomain: "rachel-hulshof.firebaseapp.com",
    projectId: "rachel-hulshof",
    storageBucket: "rachel-hulshof.appspot.com",
    messagingSenderId: "324732111099",
    appId: "1:324732111099:web:6ae241d6dbe33aae16485e",
};

const app = initializeApp(firebaseConfig);

const messaging = getMessaging(app);

function requestPermission() {
    Notification.requestPermission().then((permission) => {
        if (permission === "granted") {
            console.log("Notification permission granted.");

            getToken(messaging, {
                vapidKey:
                    "BMXf32eNU9l-5Ckrfaj0XSAQ4pHyQ3XRyRQCQH6vYUxoMM7vANcZC71b1Pt8Q5I1P7istuP_pOC5H5-h4cf4LwM",
            })
                .then((currentToken) => {
                    if (currentToken) {
                        console.log("Token: ", currentToken);
                    } else {
                        console.log(
                            "No registration token available. Request permission to generate one."
                        );
                    }
                })
                .catch((err) => {
                    console.log(
                        "An error occurred while retrieving token. ",
                        err
                    );
                });
        } else {
            console.log("Unable to get permission to notify.");
        }
    });
}

requestPermission();
