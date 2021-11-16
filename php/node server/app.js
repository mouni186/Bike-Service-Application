const express = require('express');
const cors = require('cors');
const nodeMailer = require('nodemailer');

const app = express();

app.get('/sendMail', cors(), (request, response) => {
    console.log(request.query);

    // node mailer
    let userMail = request.query.mail;
    let service = request.query.service;
    let serviceDate = request.query.date;

    const transporter = nodeMailer.createTransport({
        host: 'smtp.gmail.com',
        port: 587,
        auth: {
            user: '19mca008mounika.s@gmail.com',
            pass: 'ouwkaismaiogyoqv'
        },
    })
    transporter.sendMail({
        from: `"Mounika" <19mca008mounika.s@gmail.com>`, // host admin
        to: '19mca008mounika.s@gmail.com',  // to admin
        subject: "New Service Booked",
        text: "new " + service + " service for " + userMail   //msg value
 
    }).then(console.log("MAil Sent")).catch(e => console.log(e));
    console.log("Service End");

})
app.get('/Completed',cors(),(req,res) =>
{
    let usermailid = req.query.mail;
    console.log(usermailid);
    const transpoter = nodeMailer.createTransport({
        host: 'smtp.gmail.com',
        port: 587,
        auth: {
            user: '19mca008mounika.s@gmail.com',
            pass: 'ouwkaismaiogyoqv'
        },
    })
    transpoter.sendMail({
        from:`"Mounika" <19mca008mounika.s@gmail.com>`,
        to:usermailid,
        subject:"service completed",
        text:"your bike service is completed"

    }).then(console.log("mail.sent")).catch(e => console.log((e)));
    res.send("<script> alert('mail sended'); history.go(-1); </script>")



})
let port = 5000;

app.listen(port, () => {
    console.log('Port Running...');
    
})