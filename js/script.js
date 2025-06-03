function showCat() {
  document.getElementById('cat-container').classList.remove('hidden');
  document.getElementById('cat-container').style.animation = 'cat-animation 5s infinite';
}

function hideCat() {
  document.getElementById('cat-container').classList.add('hidden');
}

//audio

const c = document.getElementById("audioPlay");

let opt = {
  width: c.offsetWidth,
  height: c.offsetHeight,
  midY: c.offsetHeight / 2,
  points: 80,
  stretch: 10,
  sinHeight: 0,
  speed: -0.1,
  strokeColor: "rgb(45, 180, 171)",
  strokeWidth: 3,
};

c.width = opt.width * 2;
c.height = opt.height * 2;
c.style.width = opt.width;
c.style.height = opt.height;

const ctx = c.getContext("2d");
ctx.scale(2, 2);
ctx.strokeStyle = opt.strokeColor;
ctx.lineWidth = opt.strokeWidth;
ctx.lineCap = "round";
ctx.lineJoin = "round";

let time = 0;

const render = () => {
  window.requestAnimationFrame(render);
  ctx.clearRect(0, 0, opt.width, opt.height);
  time += 1;
  ctx.beginPath();
  let increment = 0;
  for (let i = 0; i < opt.points; i++) {
    if (i < opt.points / 2) {
      increment += 0.1;
    } else {
      increment += -0.1;
    }
    const x = (opt.width / opt.points) * i;
    const y =
      opt.midY +
      Math.sin(time * opt.speed + i / opt.stretch) *
        opt.sinHeight *
        increment;
    ctx.lineTo(x, y);
  }
  ctx.stroke();
};
render();



var music = new Howl({
  src: ["assets/musique.mp3"],
  volume: 0.5,
  loop: true,
});

c.addEventListener("mouseover", () => {
  TweenMax.to(opt, 1, {
    sinHeight: 15,
    strech: 5,
    ease: Power2.easeInOut,
  });

  music.play();
});

c.addEventListener("mouseout", () => {
  TweenMax.to(opt, 1, {
    sinHeight: 0,
    strech: 10,
    ease: Power3.easeOut,
  });


  music.stop();
});

