const emailInput = document.getElementById("emailInput");
const emailLabel = document.getElementById("emailLabel");

const passwordInput = document.getElementById("passwordInput");
const passwordLabel = document.getElementById("passwordLabel");

// Animation E-Mail
emailInput.addEventListener("input", () => {
  if (emailInput.value !== "") {
    emailLabel.style.top = "20px";
    emailLabel.style.fontSize = "10px";
    emailLabel.style.left = "-19px";
  } else {
    emailLabel.style.top = "32px";
    emailLabel.style.fontSize = "12px";
    emailLabel.style.left = "2px";
  }
});

// Animation Password
passwordInput.addEventListener("input", () => {
  if (passwordInput.value !== "") {
    passwordLabel.style.top = "20px";
    passwordLabel.style.fontSize = "10px";
    passwordLabel.style.left = "-100px";
  } else {
    passwordLabel.style.top = "32px";
    passwordLabel.style.fontSize = "12px";
    passwordLabel.style.left = "-95px";
  }
});
