let debug = "testblblfcdrg";


let txtCompare = "";

// fetch la bible hostée sur github
fetch('https://raw.githubusercontent.com/Nazlet11/nazlet.xyz/refs/heads/master/bible/Bible.txt')
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
  ////document.getElementById("debugtextshow").textContent=txtCompare;
  ////document.getElementById("debugtextshow").textContent=entryParsed;

  
    if (!txtCompare) {
    alert("Le fichier n'est pas encore chargé");
    return;
  }

  for (let word of entryParsed) {
    let regex = new RegExp(word, "g");
    var trouvé = txtCompare.match(regex);
    if(trouvé) {
      if (!wordsFound.includes(word)) {
        wordsFound.push(`${word} (${trouvé.length})`);
        document.getElementById("wordsFoundtxt").textContent=wordsFound;
      }
    }
  }

}
