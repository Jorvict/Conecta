const menu = document.querySelector('.nav');
const menuButton = document.querySelector('.burger-button');

function ShowHideMenu(){
  if (menu.classList.contains('is-active')){
    menu.classList.remove('is-active');
  }
  else{
    menu.classList.add('is-active');
  }
}
menuButton.addEventListener('click', ShowHideMenu)
