let adminnameRef = document.getElementById("adminname");
let passwordRef = document.getElementById("password");
let eyeL = document.querySelector(".eyeball-l");
let eyeR = document.querySelector(".eyeball-r");
let handL = document.querySelector(".hand-l");
let handR = document.querySelector(".hand-r");

let normalEyeStyle = () => {
  eyeL.style.cssText = "left: 0.6em; top: 0.6em;";
  eyeR.style.cssText = "right: 0.6em; top: 0.6em;";
};

let normalHandStyle = () => {
  handL.style.cssText =
    "height: 2.81em; top: 3em; left: 7.5em; transform: rotate(0deg);";
  handR.style.cssText =
    "height: 2.81em; top: 3em; right: 7.5em; transform: rotate(0deg);";
};

// When clicked on adminname input
adminnameRef.addEventListener("focus", () => {
  eyeL.style.cssText = "left: 0.75em; top: 1.12em;";
  eyeR.style.cssText = "right: 0.75em; top: 1.12em;";
  normalHandStyle();
});

// When clicked on password input
passwordRef.addEventListener("focus", () => {
  handL.style.cssText =
    "height: 6.56em; top: -2em; left: 11.75em; transform: rotate(-155deg);";
  handR.style.cssText =
    "height: 6.56em; top: -2em; right: 11.75em; transform: rotate(155deg);";
  normalEyeStyle();
});

// When clicked outside adminname and password input
document.addEventListener("click", (e) => {
  let clickedElem = e.target;
  if (clickedElem != adminnameRef && clickedElem != passwordRef) {
    normalEyeStyle();
    normalHandStyle();
  }
});