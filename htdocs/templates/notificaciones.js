       document.addEventListener("DOMContentLoaded", function() {
            if (!Notification) {
                alert("Las notificaciones no se soportan en tu navegador, bajate uno más nuevo.");
                return;
            }
            if (Notification.permission !== "granted")
                Notification.requestPermission();
        });

        function notificar() {
            if (Notification.permission !== "granted") {
                Notification.requestPermission();
            } else {
                var notification = new Notification("www.naturalcode.com", {
                    icon: "https://img2.freepng.es/20181128/vjs/kisspng-cloud-gif-clip-art-rain-drawing-cloud-rain-freetoedit-sticker-by-hanjo-rafael-5bfe31eeec1d49.8285672115433855829671.jpg",
                    body: "Alerta Peligro!!!"
                });
                notification.onclick = function() {
                    window.open("https://mail.google.com/mail/u/0/#inbox");
                }
            }
        }