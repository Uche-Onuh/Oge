const myslide = document.querySelectorAll(".myslider"),
  dot = document.querySelectorAll(".dot");
const bar = document.getElementById("bar");
const nav = document.getElementById("navbar");
const close = document.getElementById("close");
const x = document.getElementById("signin");
const y = document.getElementById("register");
const z = document.getElementById("btn");
const reg = document.getElementById("reg");
const sign = document.getElementById("sign");
const current = document.getElementsByClassName("current");


// responsive navbar
if (bar) {
  bar.addEventListener("click", () => {
    nav.classList.add("active");
  });
}

if (close) {
  close.addEventListener("click", () => {
    nav.classList.remove("active");
  });
}

// arrow hide
window.addEventListener("scroll", () => {
  const arrow = document.getElementById("arrowbtn");
  arrow.classList.toggle("active", window.scrollY > 300);
});

// homepage slideshow
let counter = 1;
slidefun(counter);

let timer = setInterval(autoSlide, 15000);
function autoSlide() {
  counter += 1;
  slidefun(counter);
}
function plusSlides(n) {
  counter += n;
  slidefun(counter);
  resetTimer();
}
function currentSlide(n) {
  counter = n;
  slidefun(counter);
  resetTimer();
}
function resetTimer() {
  clearInterval(timer);
  timer = setInterval(autoSlide, 15000);
}

function slidefun(n) {
  let i;
  for (i = 0; i < myslide.length; i++) {
    myslide[i].style.display = "none";
  }
  for (i = 0; i < dot.length; i++) {
    dot[i].className = dot[i].className.replace(" active1", "");
  }
  if (n > myslide.length) {
    counter = 1;
  }
  if (n < 1) {
    counter = myslide.length;
  }
  myslide[counter - 1].style.display = "block";
  dot[counter - 1].className += " active1";
}

// signin and register form slider
function register() {
  x.style.left = "-400px";
  y.style.left = "50px";
  z.style.left = "110px";
}

function signin() {
  x.style.left = "50px";
  y.style.left = "450px";
  z.style.left = "0px";
}

