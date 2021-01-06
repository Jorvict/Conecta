const login = document.querySelector('.login-container');
const loginButton = document.querySelector('.Login');
const closeButtonLogin = document.querySelector('.close-button-login');

// Desplegar Login
function ShowLogin(){
    login.classList.add('is-activel')
}
loginButton.addEventListener('click', ShowLogin);

// Ocultar Login
function HideLogin(){
    login.classList.remove('is-activel')
}
closeButtonLogin.addEventListener('click', HideLogin);