"use strict";
/***************************** */
/**********variables********** */
/***************************** */
const body = document.getElementById("body");
const password = document.getElementById("password");
const message2 = document.getElementById("message2");
const form = document.getElementById("form");
const passwordWeak = new RegExp(
  "([0-9]){12,}|([a-z]{9,13})|((?=.*[a-z])(?=.*[A-Z])([a-zA-Z]{7,10}))|((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(.{7,10}))"
);
const passwordMedium = new RegExp(
  "([a-z]{14,17})|((?=.*[a-z])(?=.*[A-Z])([a-zA-Z]{12,14}))|((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{11,13}))|((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(.{11,12}))"
);
const passwordStrong = new RegExp(
  "([a-z]{18})|((?=.*[a-z])(?=.*[A-Z])([a-zA-Z]{15,17}))|((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{14,16}))|((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(.{13,15}))"
);
const passwordUnbreakable = new RegExp(
  "((?=.*[a-z])(?=.*[A-Z])([a-zA-Z]{18}))|((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{17,18}))|((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(.{18,}))"
);
/***************************** */
/**********functions********** */
/***************************** */
const passwordStrength = (e) => {
  e.preventDefault();

  const passwordSaisi = password.value;

  if (passwordUnbreakable.test(passwordSaisi)) {
    message2.innerHTML = `<span>Mot de passe très fort</span>`;
  } else if (passwordStrong.test(passwordSaisi)) {
    message2.innerHTML = `<span>Ce mot de passe est fort.</span>`;
  } else if (passwordMedium.test(passwordSaisi)) {
    message2.innerHTML = `<span>Ce mot de passe est moyennement fort.</span>`;
  } else if (passwordWeak.test(passwordSaisi)) {
    message2.innerHTML = `<span>Ce mot de passe est faible.</span>`;
  } else {
    message2.innerHTML = `<span>Attention ! Mot de passe trop faible</span>`;
  }
};

const hide = () => {
  message2.innerHTML = "";
  password.style.backgroundColor = "white";
};

/***************************** */
/**********execution********** */
/***************************** */

password.addEventListener("keyup", passwordStrength);
body.addEventListener("click", hide);

//lowercase letters
//upper and lowercase letters
//numbers, upper and lowercase letters
//numbers, upper and lowercase letters, symbols
