/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.6.8/firebase-messaging.js');
importScripts('https://www.gstatic.com/firebasejs/8.6.8/firebase-analytics.js');
   
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
    apiKey: "AIzaSyB0e5Cq6q0c7rFx-YtSIa8Ib4h85xjTd6I",
    authDomain: "laravel-itk.firebaseapp.com",
    projectId: "laravel-itk",
    storageBucket: "laravel-itk.appspot.com",
    messagingSenderId: "592986504219",
    appId: "1:592986504219:web:93d88f5e6dc231d88c8cbe",
    measurementId: "G-3DS7F0TQVC"
});
  
/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };
  
    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});