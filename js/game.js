var fireworksEnabled = false;

//varibles globales qui enregistrent la premiere carte jouée
var premiereCarte = null;

var sonActuel = false;

//tableau qui enregistre les erreurs
const soundsErrors = {};
//tableau qui enregistre les carte retournées
var carteRetourner = [
  false,
  false,
  false,
  false,
  false,
  false,
  false,
  false,
  false,
  false,
  false,
  false,
  false,
  false,
  false,
  false,
];
//Ordre des sons trouvé
var nbFind = 0;

var nbMoves = 0;

/*//variables pour le chronomètre
var debutChrono;
var etat = false; //etat du chronomètre
*/
var elapsedTime = 0;


// Fonction pour afficher l'indicateur de chargement
function showLoadingIndicator() {
  const loadingIndicator = document.getElementById("loading");
  loadingIndicator.style.display = "flex";
  const finishPopup = document.getElementById("finish");
  finishPopup.style.display = "none";
}

// Fonction pour masquer l'indicateur de chargement
function hideLoadingIndicator() {
  const loadingIndicator = document.getElementById("loading");
  loadingIndicator.style.display = "none";
}
//fonction pour masquer l'indicateur de chargement et démarrer le chronomètre
function hideLoadingAndStartChrono() {
  document.getElementById("loading").style.display = "none";
  startChrono();
}
// Initialisation du temps (80 secondes)
let tempsRestant = 80;
let intervalChrono;
let etat = false; // Permet de ne pas redémarrer le chrono plusieurs fois

// Mettre à jour l'affichage dès le chargement de la page
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("chronometer").textContent = "01:20";
});

// Fonction pour démarrer le chrono (si non déjà en cours)
function startChrono() {
    if (!etat) {
        etat = true;
        intervalChrono = setInterval(updateChrono, 1000);
    }
}

// Fonction pour arrêter le chrono
function stopChrono() {
    etat = false;
    clearInterval(intervalChrono);
}

// Fonction pour mettre à jour l'affichage du chrono et gérer la fin du temps
function updateChrono() {
    if (tempsRestant > 0) {
        tempsRestant--;

        let minutes = Math.floor(tempsRestant / 60);
        let seconds = tempsRestant % 60;

        // Formatage pour afficher 2 chiffres (ex: 09 au lieu de 9)
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        // Mettre à jour l'affichage dans le HTML
        document.getElementById("chronometer").textContent = minutes + ":" + seconds;
    } else {
        stopChrono();
        sendPartie();
        document.getElementById("sen").textContent = "Ops !";
        document.getElementById("mess").textContent = "Le temps est fini, vous avez perdu"
        document.getElementById("finish").style.display = "flex"; // Afficher un message de fin
        
    }
}

//bouton rejouer
document.getElementById("finish-button").addEventListener("click", function () {
  location.reload();
});

// Fonction pour effectuer la requête fetch
function fetchSounds() {
  return fetch("Memoteam/get_sounds").then((response) => {
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    return response.json();
  });
}

//Fonction de creation du user in body "pseudo"
function createUser() {
  const formData = new FormData();

  formData.append("pseudo", "pseudo");
  formData.append("genre", document.getElementById("question1").value);
  formData.append("age", document.getElementById("question2").value);
  formData.append("instrument", document.getElementById("question3").value);
  formData.append("solfege", document.getElementById("question4").value);
  formData.append("musique", document.getElementById("question5").value);
  formData.append("pathologie", document.getElementById("question6").value);

  const urlSearchParams = new URLSearchParams(formData);

  fetch("/Memoteam/create_user", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: urlSearchParams.toString(),
  })
    .then((response) => response.json())
    .then((data) => {
      localStorage.setItem("user", data.id);
    })
    .catch((error) => {
      console.error("Erreur lors de la création de l'utilisateur :", error);
    });
}

var cartes = document.getElementsByClassName("container-carte");

// Fonction pour enlever "carte-" dans l'id de la carte
function removeCardPrefix(card) {
  if (card.id.startsWith("carte-")) {
    return card.id.substring(6); // 6 est la longueur du préfixe "carte-"
  }
  return card.id;
}

// Fonction pour dupliquer les sons
function duplicateSounds(sounds) {
  return [...sounds, ...sounds];
}

// Fonction pour mélanger les sons
function shuffleSounds(sounds) {
  return sounds.sort(() => Math.random() - 0.5);
}

// Appel de la fonction fetchSounds avec gestion de chargement
showLoadingIndicator();
fetchSounds().then((sounds) => {
  setTimeout(() => {
    hideLoadingIndicator();
  }, 2000);
  if (localStorage.getItem("user") == null) {
    createUser();
  }

  carteSounds = shuffleSounds(duplicateSounds(sounds));

  for (let i = 0; i < carteSounds.length; i++) {
    cartes[i].addEventListener("click", function () {
      play(carteSounds[i], cartes[i]);
    });
    if (!soundsErrors[carteSounds[i].id]) {
      soundsErrors[carteSounds[i].id] = { error: 0, find: 10 };
    }
  }
});

function play(sound, carte) {
  if (sonActuel || premiereCarte == carte) {
    console.log("son déjà en train de jouer");
    return;
  } else {
    nbMoves += 1;
    undercoveredCard(carte);
    playSound(sound);
    if (premiereCarte == null) {
      premiereCarte = carte;
      // Démarrer le chronomètre lorsque le joueur commence à jouer
      hideLoadingAndStartChrono();
      return;
    } else {
      sendMovement(carte);
      if (
        carteSounds[removeCardPrefix(premiereCarte)] ==
        carteSounds[removeCardPrefix(carte)]
      ) {
        carteTrouver(premiereCarte, carte);
        return;
      } else {
        carteNonTrouver(premiereCarte, carte);
        return;
      }
    }
  }
}

// Fonction pour jouer le son
function playSound(sound) {
  sonActuel = true;

  const audioContext = new AudioContext();
  const gain = new GainNode(audioContext);
  gain.connect(audioContext.destination);
  if (sound.type == "sine") {
    gain.gain.value = 0.5;
  } else {
    gain.gain.value = 0.1;
  }

  const oscillator = new OscillatorNode(audioContext);
  oscillator.connect(gain);
  oscillator.type = sound.type;
  oscillator.frequency.value = sound.frequency;
  oscillator.start();

  setTimeout(() => {
    oscillator.stop();
    sonActuel = false;
  }, sound.time);
}

const carteTrouver = function (carte1, carte2) {
  console.log("on est la en avance")
  carte1.classList.add("carte-trouver");
  carte2.classList.add("carte-trouver");
  carte1.style.backgroundColor = "#FBFCFC";
  carte2.style.backgroundColor = "#FBFCFC";
  setTimeout(() => {
    carte1.style.display = "none";
    carte2.style.display = "none";
  }, 1000);
  if (
    carteRetourner[removeCardPrefix(carte2)] == false
  ) {
    AddFind(removeCardPrefix(carte1), true);
  } else {
    AddFind(removeCardPrefix(carte1));
  }
  premiereCarte = null;

  if (document.querySelectorAll(".carte-trouver").length === cartes.length) {
    console.log("on est la")
    sendPartie();
    stopChrono();
    const finishPopup = document.getElementById("finish");
    const finishTime = document.getElementById("finish-time");
    finishTime.textContent = document.getElementById("chronometer").textContent;
    finishPopup.style.display = "flex";
    fireworksEnabled = true;
    setTimeout(function () {
      fireworksEnabled = false;
    }, 10000);
    sendMultipleFireworks();
  }
};

const carteNonTrouver = function (carte1, carte2) {
  carte1.classList.add("carte-non-trouver");
  carte2.classList.add("carte-non-trouver");
  CountErrors(removeCardPrefix(carte1));
  CountErrors(removeCardPrefix(carte2));
  premiereCarte = null;
  reset(carte1, carte2);
};

const reset = function (carte1, carte2) {
  setTimeout(() => {
    carte1.classList.remove("carte-non-trouver");
    carte2.classList.remove("carte-non-trouver");
    carte1.style.transition = "transform 1.5s";
    carte1.style.transform = "";
    carte1.style.backgroundColor = "#16395E";
    carte2.style.transition = "transform 1.5s";
    carte2.style.transform = "";
    carte2.style.backgroundColor = "#16395E";
  }, 1200);
};

//Fonction pour animer les cartes
function undercoveredCard(card) {
  card.style.transition = "transform 1.5s";
  card.style.transform = "rotateY(180deg)";
  card.style.backgroundColor = "#65b0ff";
}

// Fonction pour compter les erreurs
function CountErrors(carteId) {
  if (carteRetourner[carteId] == false) {
    carteRetourner[carteId] = true;
  } else {
    soundsErrors[carteSounds[carteId].id].error += 1;
  }
}

function AddFind(carteId, chance = false) {
  if (chance) {
    soundsErrors[carteSounds[carteId].id].find = -1;
  } else {
    soundsErrors[carteSounds[carteId].id].find = nbFind;
  }
  nbFind += 1;
}

function sendPartie() {
  const formData = new FormData();
  formData.append("user", localStorage.getItem("user"));
  formData.append("score", Math.floor(elapsedTime / 1000));
  formData.append("errors", JSON.stringify(soundsErrors));
  formData.append("nbMoves", nbMoves);
  const urlSearchParams = new URLSearchParams(formData);
  fetch("/Memoteam/end_game", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: urlSearchParams.toString(),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.error("Erreur lors de la création de la partie :", error);
    });
}

function sendMovement(carte) {
  //console.log(carteSounds[removeCardPrefix(premiereCarte)].id);
  //console.log(carteSounds[removeCardPrefix(carte)].id);
  const formData = new FormData();
  formData.append("premiereCarte", carteSounds[removeCardPrefix(premiereCarte)].id);
  formData.append("carte", carteSounds[removeCardPrefix(carte)].id);
  
  const urlSearchParams = new URLSearchParams(formData);
  
  fetch("/Memoteam/movement", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: urlSearchParams.toString(),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.error("Erreur lors de l'envoi du mouvement :", error);
    });
}

// Envoyer plusieurs feux d'artifice
function sendMultipleFireworks() {
  var fireworksCount = 30;
  var duration = 10000; // Durée en millisecondes
  var interval = duration / fireworksCount;
  var timer = setInterval(function () {
    if (fireworksEnabled) {
      fireworks.push(
        new Firework(cw / 2, ch, random(0, cw), random(0, ch / 2))
      );
    } else {
      clearInterval(timer);
    }
  }, interval);
}

// when animating on canvas, it is best to use requestAnimationFrame instead of setTimeout or setInterval
// not supported in all browsers though and sometimes needs a prefix, so we need a shim
window.requestAnimFrame = (function () {
  return (
    window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    function (callback) {
      window.setTimeout(callback, 1000 / 60);
    }
  );
})();

// now we will setup our basic variables for the demo
var canvas = document.getElementById("canvas"),
  ctx = canvas.getContext("2d"),
  cw = window.innerWidth,
  ch = window.innerHeight,
  fireworks = [],
  particles = [],
  // starting hue
  hue = 120,
  // when launching fireworks with a click, too many get launched at once without a limiter, one launch per 5 loop ticks
  limiterTotal = 5,
  limiterTick = 0,
  // this will time the auto launches of fireworks, one launch per 80 loop ticks
  timerTotal = 80,
  timerTick = 0,
  mousedown = false,
  // mouse x coordinate,
  mx,
  // mouse y coordinate
  my;

// set canvas dimensions
canvas.width = cw;
canvas.height = ch;

// now we are going to setup our function placeholders for the entire demo

// get a random number within a range
function random(min, max) {
  return Math.random() * (max - min) + min;
}

// calculate the distance between two points
function calculateDistance(p1x, p1y, p2x, p2y) {
  var xDistance = p1x - p2x,
    yDistance = p1y - p2y;
  return Math.sqrt(Math.pow(xDistance, 2) + Math.pow(yDistance, 2));
}

// create firework
function Firework(sx, sy, tx, ty) {
  // actual coordinates
  this.x = sx;
  this.y = sy;
  // starting coordinates
  this.sx = sx;
  this.sy = sy;
  // target coordinates
  this.tx = tx;
  this.ty = ty;
  // distance from starting point to target
  this.distanceToTarget = calculateDistance(sx, sy, tx, ty);
  this.distanceTraveled = 0;
  // track the past coordinates of each firework to create a trail effect, increase the coordinate count to create more prominent trails
  this.coordinates = [];
  this.coordinateCount = 3;
  // populate initial coordinate collection with the current coordinates
  while (this.coordinateCount--) {
    this.coordinates.push([this.x, this.y]);
  }
  this.angle = Math.atan2(ty - sy, tx - sx);
  this.speed = 15;
  this.acceleration = 1.05;
  this.brightness = random(50, 70);
  // circle target indicator radius
  this.targetRadius = 1;
}

// update firework
Firework.prototype.update = function (index) {
  // remove last item in coordinates array
  this.coordinates.pop();
  // add current coordinates to the start of the array
  this.coordinates.unshift([this.x, this.y]);

  // cycle the circle target indicator radius
  if (this.targetRadius < 8) {
    this.targetRadius += 0.3;
  } else {
    this.targetRadius = 1;
  }

  // speed up the firework
  this.speed *= this.acceleration;

  // get the current velocities based on angle and speed
  var vx = Math.cos(this.angle) * this.speed,
    vy = Math.sin(this.angle) * this.speed;
  // how far will the firework have traveled with velocities applied?
  this.distanceTraveled = calculateDistance(
    this.sx,
    this.sy,
    this.x + vx,
    this.y + vy
  );

  // if the distance traveled, including velocities, is greater than the initial distance to the target, then the target has been reached
  if (this.distanceTraveled >= this.distanceToTarget) {
    createParticles(this.tx, this.ty);
    // remove the firework, use the index passed into the update function to determine which to remove
    fireworks.splice(index, 1);
  } else {
    // target not reached, keep traveling
    this.x += vx;
    this.y += vy;
  }
};

// draw firework
Firework.prototype.draw = function () {
  ctx.beginPath();
  // move to the last tracked coordinate in the set, then draw a line to the current x and y
  ctx.moveTo(
    this.coordinates[this.coordinates.length - 1][0],
    this.coordinates[this.coordinates.length - 1][1]
  );
  ctx.lineTo(this.x, this.y);
  ctx.strokeStyle = "hsl(" + hue + ", 100%, " + this.brightness + "%)";
  ctx.stroke();

  ctx.beginPath();
  // draw the target for this firework with a pulsing circle
  ctx.arc(this.tx, this.ty, this.targetRadius, 0, Math.PI * 2);
  ctx.stroke();
};

// create particle
function Particle(x, y) {
  this.x = x;
  this.y = y;
  // track the past coordinates of each particle to create a trail effect, increase the coordinate count to create more prominent trails
  this.coordinates = [];
  this.coordinateCount = 5;
  while (this.coordinateCount--) {
    this.coordinates.push([this.x, this.y]);
  }
  // set a random angle in all possible directions, in radians
  this.angle = random(0, Math.PI * 2);
  this.speed = random(1, 10);
  // friction will slow the particle down
  this.friction = 0.95;
  // gravity will be applied and pull the particle down
  this.gravity = 1;
  // set the hue to a random number +-20 of the overall hue variable
  this.hue = random(hue - 20, hue + 20);
  this.brightness = random(50, 80);
  this.alpha = 1;
  // set how fast the particle fades out
  this.decay = random(0.015, 0.03);
}

// update particle
Particle.prototype.update = function (index) {
  // remove last item in coordinates array
  this.coordinates.pop();
  // add current coordinates to the start of the array
  this.coordinates.unshift([this.x, this.y]);
  // slow down the particle
  this.speed *= this.friction;
  // apply velocity
  this.x += Math.cos(this.angle) * this.speed;
  this.y += Math.sin(this.angle) * this.speed + this.gravity;
  // fade out the particle
  this.alpha -= this.decay;

  // remove the particle once the alpha is low enough, based on the passed in index
  if (this.alpha <= this.decay) {
    particles.splice(index, 1);
  }
};

// draw particle
Particle.prototype.draw = function () {
  ctx.beginPath();
  // move to the last tracked coordinates in the set, then draw a line to the current x and y
  ctx.moveTo(
    this.coordinates[this.coordinates.length - 1][0],
    this.coordinates[this.coordinates.length - 1][1]
  );
  ctx.lineTo(this.x, this.y);
  ctx.strokeStyle =
    "hsla(" +
    this.hue +
    ", 100%, " +
    this.brightness +
    "%, " +
    this.alpha +
    ")";
  ctx.stroke();
};

// create particle group/explosion
function createParticles(x, y) {
  // increase the particle count for a bigger explosion, beware of the canvas performance hit with the increased particles though
  var particleCount = 30;
  while (particleCount--) {
    particles.push(new Particle(x, y));
  }
}

// main demo loop
function loop() {
  // this function will run endlessly with requestAnimationFrame
  requestAnimFrame(loop);

  // increase the hue to get different colored fireworks over time
  hue += 0.5;

  // normally, clearRect() would be used to clear the canvas
  // we want to create a trailing effect though
  // setting the composite operation to destination-out will allow us to clear the canvas at a specific opacity, rather than wiping it entirely
  ctx.globalCompositeOperation = "destination-out";
  // decrease the alpha property to create more prominent trails
  ctx.fillStyle = "rgba(0, 0, 0, 0.5)";
  ctx.fillRect(0, 0, cw, ch);
  // change the composite operation back to our main mode
  // lighter creates bright highlight points as the fireworks and particles overlap each other
  ctx.globalCompositeOperation = "lighter";

  // loop over each firework, draw it, update it
  var i = fireworks.length;
  while (i--) {
    fireworks[i].draw();
    fireworks[i].update(i);
  }

  // loop over each particle, draw it, update it
  var i = particles.length;
  while (i--) {
    particles[i].draw();
    particles[i].update(i);
  }

  // launch fireworks automatically to random coordinates, when the mouse isn't down
  if (timerTick >= timerTotal) {
    if (!mousedown && fireworksEnabled) {
      // Ajoutez fireworksEnabled
      fireworks.push(
        new Firework(cw / 2, ch, random(0, cw), random(0, ch / 2))
      );
      timerTick = 0;
    }
  } else {
    timerTick++;
  }

  // limit the rate at which fireworks get launched when mouse is down
  if (limiterTick >= limiterTotal) {
    if (mousedown) {
      // start the firework at the bottom middle of the screen, then set the current mouse coordinates as the target
      fireworks.push(new Firework(cw / 2, ch, mx, my));
      limiterTick = 0;
    }
  } else {
    limiterTick++;
  }
}

// mouse event bindings
// update the mouse coordinates on mousemove
canvas.addEventListener("mousemove", function (e) {
  mx = e.pageX - canvas.offsetLeft;
  my = e.pageY - canvas.offsetTop;
});

// toggle mousedown state and prevent canvas from being selected
canvas.addEventListener("mousedown", function (e) {
  e.preventDefault();
  mousedown = true;
});

canvas.addEventListener("mouseup", function (e) {
  e.preventDefault();
  mousedown = false;
});

// once the window loads, we are ready for some fireworks!
window.onload = loop;
