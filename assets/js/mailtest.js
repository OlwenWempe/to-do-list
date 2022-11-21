"use strict";
/***************************** */
/**********variables********** */
/***************************** */
//let mail;
let mail;
const message = document.getElementById("message");
/***************************** */
/**********functions********** */
/***************************** */

const ValidateEmail = () => {
  mail = document.getElementById("email").value;
  if (mail == "") {
    return false;
  }
  let RegExp =
    /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  if (!RegExp.test(mail)) {
    message.innerHTML = `<span style="color : red;">Cet adresse mail n'est pas valide.</span>`;
  } else {
    message.innerHTML = `<span class="text-success">Cet adresse mail est valide.</span>`;
  }
};
/***************************** */
/**********execution********** */
/***************************** */
document
  .getElementById("email")
  .addEventListener("keyup", ValidateEmail, false);
