const express = require("express");
const bodyParser = require('body-parser');
const path = require('path');
const url = require('url');
const fs = require('fs');

const app = express();

//staðsettning fyrir html síðurnar
var files = path.normalize("./frontend/");

//logga allt sem gerist á síðunni
function log(text){
    fs.appendFile("./server/log.txt", text, function(err) {
        if(err) {
            return console.log(err);
        }
    });
}

//setup
app.use(bodyParser());
app.use('/', express.static(files));

//handel-a index request ef þess þarf
app.get('/', function(req, resp){
  var d = new Date().toISOString();

  log("User entered the site by the ip: " + req.connection.remoteAddress + " - " + d + "\n");
  resp.sendFile('index.html', {root: files});
});

//handelar allar aðrar GET request á file-a
app.get(/^(.+)$/, function(req, resp){
    try{
        var url_parts = url.parse(req.url, true);
        var file_type = path.extname(url_parts.pathname);
        var file = req.params[0];
        
        if(file_type == ".html" || file_type == ""){
            file = "/html" + file;

            if(file_type == ""){
                file += ".html"; 
            }
        }

        console.log(file);

        if(fs.existsSync(files+file))
        {
            resp.sendFile(file, {root: files});
        }
        else if(file_type == ".html" || file_type == ""){
            resp.sendFile('404.html', {root: "./frontend/errors"});
        }
        else{
            resp.end();
        }
    }
    catch(e){
        log("ERROR - caused by ip: " + req.connection.remoteAddress + "\n" + e.message);
    }
});


module.exports = app;