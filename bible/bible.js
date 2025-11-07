let debug = "testblblfcdrg";


let txtCompare = "sac";
fetch('http://nazlet.xyz/bbl.txt?i=1')
  .then(response => response.text())
  .then((data) => {
    txtCompare = data;
  })
  .catch(err => console.error(err));


let entryUnparsed = [];
let entryParsed = [];
let wordsFound = [];


var button = document.createElement("button");



function bouton() {
  let wordsFound = [];

  let txtarea = document.querySelector('.txtarea').value;
  entryParsed = txtarea.match(/\b[\w']+\b/g);
    document.getElementById("debugtextshow").textContent=txtCompare;
  //document.getElementById("debugtextshow").textContent=entryParsed;
  
    if (!txtCompare) {
    alert("Le fichier n'est pas encore chargé !");
    return;
  }

  for (let word of entryParsed) {
    let regex = new RegExp(word, "g");
    var trouvé = txtCompare.match(regex);
    if(trouvé) {
      wordsFound.push(trouvé);
      document.getElementById("wordsFoundtxt").textContent=wordsFound;
    }
  }

}
