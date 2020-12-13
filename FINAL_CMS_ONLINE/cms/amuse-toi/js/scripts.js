"use strict";
const secretNumber = Math.trunc(Math.random() * 20) + 1;
let score = 20;
const displayMessage = function (message) {
  document.querySelector(".message").textContent = message;
};
//document.querySelector(".number").textContent = secretNumber;
let highScore = (document.querySelector(".highscore").textContent = 0);
document.querySelector(".check").addEventListener("click", function () {
  const guess = Number(document.querySelector(".guess").value);
  if (!guess) {
    displayMessage("Saisissez un nombre");
  } else if (guess == secretNumber) {
    displayMessage("Vous avez gagné, bravo!");
    document.querySelector("body").style.background = "#60b347";
    highScore += score;
    document.querySelector(".highscore").textContent = highScore;
  } else if (guess !== secretNumber) {
    if (score > 1) {
      displayMessage(
        guess > secretNumber
          ? "Le numéro saisi est trop élévé"
          : "Le numéro saisi est trop bas"
      );

      score--;
      document.querySelector(".score").textContent = score;
    } else {
      displayMessage("Vous avez perdu,relancez le jeux");

      document.querySelector(".score").textContent = 0;
      document.querySelector("body").style.background = "red";
    }
  }
});

document.querySelector(".again").addEventListener("click", function () {
  const secretNumber = Math.trunc(Math.random() * 20) + 1;
  let score = 20;
  document.querySelector(".score").textContent = 0;
  document.querySelector(".guess").value = "";
  document.querySelector("body").style.backgroundColor = "#222";
  document.querySelector(".message").textContent = "Recherche...";
  document.querySelector(".number").textContent = "?";
  document.querySelector(".number").style.width = "15rem";
});
