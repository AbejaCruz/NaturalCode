
//IMPORTANTE ANTES DE EJECUTAR INSTALAR TWILIO: npm install twilio
//SE EJECUTA CON NODE: node send-sms.js

var accountSid = 'ACc2d810d6c30868aa6f1413687948c48a'; //api key, no modificar
var authToken = '78ab451e8de7d160c31774fc7b4607e1'; //api key no, modificar

var client = require('twilio')(accountSid, authToken);

var to = "";
var numeros = ["+573194036153"]; //vector con todos los numeros objetivo

numeros.forEach(enviaSMS); //ciclo por cada numero y le envia sms

function enviaSMS(item) {
   client.messages.create({
      to: item, //numero a enviarle el sms, lo toma del vector de arriba
      from: "+12566459342", //numero origen, no modificar
      body: "ATENCION! Desprendimiento de tierra en Monserrate!",
   }, function (err, message) { //mensaje
      console.log(message.sid); //comprobacion de exito
   });
}