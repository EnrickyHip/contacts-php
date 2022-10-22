const registerButton = document.getElementById("submit_contact");

const nameInput = document.getElementById("name");
const phoneInput = document.getElementById("phone");
const emailInput = document.getElementById("email");

const errorMessage = document.getElementById("error");
const form = document.getElementById("form");

registerButton.addEventListener("click", (event) => {
  let error = false;
  errorMessage.innerHTML = "";
  event.preventDefault();

  if (!nameInput.value) {
    errorMessage.innerHTML += '<p id="name-error">name cannot be null</p>';
    error = true;
  }

  if (!phoneInput.value) {
    errorMessage.innerHTML += '<p id="phone-error">phone cannot be null</p>';
    error = true;
  }

  if (!emailInput.value) {
    errorMessage.innerHTML += '<p id="email-error">email cannot be null</p>';
    error = true;
  }

  if (error) return;
  form.submit();
});
