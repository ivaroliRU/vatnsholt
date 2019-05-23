module.exports.checkFile = function(file){
    console.log("Typpi");
    
}

//logga allt sem gerist á síðunni
module.exports.log = function(text){
    fs.appendFile("./server/log.txt", text, function(err) {
        if(err) {
            return console.log(err);
        }
    });
}