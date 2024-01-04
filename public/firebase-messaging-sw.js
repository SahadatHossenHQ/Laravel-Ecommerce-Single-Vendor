importScripts('https://www.gstatic.com/firebasejs/8.2.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.2.0/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing the generated config
var firebaseConfig = {
        apiKey: "AIzaSyBWkcZFIoW0b-jfstIQG9RpiYrAFVbK8nA",
        authDomain: "demon-ca45b.firebaseapp.com",
        projectId: "demon-ca45b",
        storageBucket: "demon-ca45b.appspot.com",
        messagingSenderId: "1049200760757",
        appId: "1:1049200760757:web:0f17e9a2a7ae51a697ebfc"

};

firebase.initializeApp(firebaseConfig);

// Retrieve firebase messaging
const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
  console.log('Received background message ', payload);

  const notificationTitle = payload.notification.title;
  const notificationOptions = {
    body: payload.notification.body,
  };

  self.registration.showNotification(notificationTitle,
    notificationOptions);
});