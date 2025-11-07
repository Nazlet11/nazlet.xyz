let debug = "testblblfcdrg";

fetch('http://nazlet.xyz/bible/Bible.txt')
  .then(response => response.text())
  .then((data) => {
    console.log(data)
  })

let txtCompare = "textea";
let entryUnparsed = [];
let entryParsed = [];
let wordsFound = [];


var button = document.createElement("button");



function bouton() {
  let wordsFound = [];

  let txtarea = document.querySelector('.txtarea').value;
  entryParsed = txtarea.match(/\b[\w']+\b/g);
  document.getElementById("debugtextshow").textContent=entryParsed;
  
  for (let word of entryParsed) {
    let regex = new RegExp(word, "g");
    var trouvé = txtCompare.match(regex);
    if(trouvé) {
      wordsFound.push(trouvé);
      document.getElementById("wordsFoundtxt").textContent=wordsFound;
    }
  }

}
