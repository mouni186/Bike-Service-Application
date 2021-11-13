const express = require('express');
const cors = require('cors');
const nodeMailer = require('nodemailer');

const app = express();

app.get('/sendMail', (request, response) => {
    console.log(request.query);

    // node mailer
    let userMail = request.query.mail;
    let service = request.query.service;
    let serviceDate = request.query.date;

    const transporter = nodeMailer.createTransport({
        host: 'smtp.gmail.com',
        port: 587,
        auth: {
            user: 'anishbalasachin13@gmail.com',
            pass: 'jipsxicjskholjay'
        },
    })
    transporter.sendMail({
        from: `"Anish" <anishbalasachin13@gmail.com>`, // host admin
        to: 'jeyajeny1227@gmail.com',  // to admin
        subject: "New Service Booked",
        text: "new " + service + " service for " + userMail   //msg value
 
    }).then(console.log("MAil Sent")).catch(e => console.log(e));
    console.log("Service End");

})

let port = 5000;

app.listen(port, () => {
    console.log('Port Running...');
    
})