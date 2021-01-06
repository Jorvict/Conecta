const menu = document.querySelector('.menu');
const menuButton = document.querySelector('.burger-button');

// Ocultar-Desplegar menu
function HideShowMenu() {
    if (menu.classList.contains('is-activem')) {
        menu.classList.remove('is-activem');
    }
    else {
        menu.classList.add('is-activem');
    }
}
menuButton.addEventListener('click', HideShowMenu);