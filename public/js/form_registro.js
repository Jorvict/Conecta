const register = document.querySelector('.form-container');
const registerButton = document.querySelector('.register');
const closeButton = document.querySelector('.close-button');

// Desplegar registro
function ShowRegister() {
    register.classList.add('is-active');
}
registerButton.addEventListener('click', ShowRegister);

// Ocultar registro
function HideRegister() {
    register.classList.remove('is-active')
}
closeButton.addEventListener('click', HideRegister);
