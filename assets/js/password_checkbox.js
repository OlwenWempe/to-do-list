"use strict";
/***************************** */
/**********variables********** */
/***************************** */

const checkBox = document.getElementById("checkBox");

/***************************** */
/**********functions********** */
/***************************** */

const passwordHide = () => {
  if (checkBox.checked === true) {
    password.type = "text";
  } else {
    password.type = "password";
  }
};

/***************************** */
/**********execution********** */
/***************************** */

if (checkBox.checked === true) {
  checkBox.checked = false;
  password.type = "password";
}
checkBox.addEventListener("click", passwordHide);
