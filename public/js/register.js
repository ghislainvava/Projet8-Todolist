
document.addEventListener('DOMContentLoaded', function() {
  console.log("DOM content loaded");
  
  const form = document.querySelector('#registration-form');
  const emailInput = document.querySelector('#email');
  const usernameInput = document.querySelector('#username');
  const passwordInput = document.querySelector('#plainPassword');
  const termsCheckbox = document.querySelector('#agreeTerms');
  const errorContainer = document.querySelector('#error-container');
  const successContainer = document.querySelector('#success-container'); 

  let params = new URLSearchParams(window.location.search);
  if(params.get('arg') == 1) showSuccess('vous êtes connecté !');
  // form.addEventListener('submit', function(event) {
  //   console.log("Form submitted");

  //   if (!validateEmail(emailInput.value)) {
  //     console.log("Invalid email");
  //     showError('Veuillez entrer une adresse e-mail valide.');
  //     event.preventDefault();
  //   } else if (!validatePassword(passwordInput.value)) {
  //     console.log("Invalid password");
  //     showError('Veuillez entrer un mot de passe valide (6 caractères minimum).');
  //     event.preventDefault();
  //   } else if (!termsCheckbox.checked) {
  //     console.log("Terms not agreed to");
  //     showError('Vous devez accepter nos conditions.');
  //     event.preventDefault();
  //   } else {
  //     console.log("Success!");
  //     showSuccess('vous êtes connecté !'); 
  //   }
  // });

  function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  function validatePassword(password) {
    return password.length >= 6;
  }

  function showError(message) {
    errorContainer.textContent = message;
    errorContainer.style.display = 'block';

  }

  function showSuccess(message) { 
    successContainer.textContent = message;
    successContainer.style.display = 'block';
   
  }
});
