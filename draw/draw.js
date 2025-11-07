let clic = false;
let coords = {x:0 , y:0};
let oldCoords = {x:0 , y:0};
let taillePinceau = 2;
let colorPinceau = 'black';
let formePinceau = 'round';
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
ctx.canvas.width = 500;
ctx.canvas.height = 280;

var button = document.createElement("button");


document.addEventListener('mousemove', function(event) {
    oldCoords = {x: coords.x, y: coords.y};
    coords.x = event.clientX - canvas.offsetLeft;
    coords.y = event.clientY - canvas.offsetTop;
    console.log('Mouse X:', event.clientX, 'Mouse Y:', event.clientY);
});

document.addEventListener("mousedown", (event) => {
  if (event.button === 0) { 
    clic = true;
    boucleclic();
    console.log("clic appuyé");
  }
});

document.addEventListener("mouseup", (event) => {
  if (event.button === 0) {
    clic = false;
    console.log("clic relaché");
  }
});




function boucleclic() {
  if (!clic) return; // stoppe la boucle si on relâche

  ctx.lineWidth = taillePinceau;
  ctx.lineCap = formePinceau;
  ctx.strokeStyle = colorPinceau;
  
  ctx.beginPath();
  ctx.moveTo(oldCoords.x, oldCoords.y);
  ctx.lineTo(coords.x, coords.y); // petit trait pour test
  ctx.stroke();

  // Relance la fonction à la prochaine frame
  requestAnimationFrame(boucleclic);
}

function save() {
  const img = document.createElement("img");
  img.src = canvas.toDataURL("image/png");
  document.body.appendChild(img);

}
