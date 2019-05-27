const express = require("express");
const bodyParser = require('body-parser');
const path = require('path');
const url = require('url');
const fs = require('fs');
const nodemailer = require('nodemailer');

const app = express();

process.env.NODE_TLS_REJECT_UNAUTHORIZED = "0";

//staðsettning fyrir html síðurnar
var files = path.normalize("./frontend/");

//logga allt sem gerist á síðunni
function log(text) {
    fs.appendFile("./server/log.txt", text, function (err) {
        if (err) {
            return console.log(err);
        }
    });
}

//setup
app.use(bodyParser());
app.use('/', express.static(files));

//handel-a index request ef þess þarf
app.get('/', function (req, resp) {
    var d = new Date().toISOString();

    log("User entered the site by the ip: " + req.connection.remoteAddress + " - " + d + "\n");
    resp.sendFile('index.html', { root: files });
});

//handelar allar aðrar GET request á file-a
app.get(/^(.+)$/, function (req, resp) {
    try {
        var url_parts = url.parse(req.url, true);
        var file_type = path.extname(url_parts.pathname);
        var file = req.params[0];

        if (file_type == ".html" || file_type == "") {
            file = "/html" + file;

            if (file_type == "") {
                file += ".html";
            }
        }

        console.log(file);

        if (fs.existsSync(files + file)) {
            resp.sendFile(file, { root: files });
        }
        else if (file_type == ".html" || file_type == "") {
            resp.sendFile('404.html', { root: "./frontend/errors" });
        }
        else {
            resp.end();
        }
    }
    catch (e) {
        log("ERROR - caused by ip: " + req.connection.remoteAddress + "\n" + e.message);
    }
});

app.post("/send_msg", (req, res) => {
    var transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'vatnsholt.messages@gmail.com',
            pass: '37QSKtajY^E3j$\'e67L\\T>j'
        }
    });

    var message = `
<h3>Name: ${req.body.fullname}</h3>
<h3>Email: ${req.body.email}</h3>
<h3>Phone: ${req.body.phone}</h3>

<p>Message: ${req.body.message}</p>
`;

    var mailOptions = {
        from: 'vatnsholt.messages@gmail.com',
        to: 'info@hotelvatnsholt.is',
        subject: 'Message from website',
        html: message
    };

    try {
        transporter.sendMail(mailOptions, function (error, info) {
            if (error) {
                console.log(error);
            } else {
                console.log('Email sent: ' + info.response);
            }
        });
        res.status(200).end();
    }
    catch (e) {
        res.status(500).end();
    }
});

module.exports = app;