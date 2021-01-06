const product = document.querySelector('.form-container-product');
const productButton = document.querySelector('.btn-product');
const closeButtonProduct = document.querySelector('.close-button-product');

// Desplegar Product
function ShowProduct(){
    product.classList.add('is-activep')
}
productButton.addEventListener('click', ShowProduct)

// Ocultar Product
function HideProduct(){
    product.classList.remove('is-activep')
}
closeButtonProduct.addEventListener('click', HideProduct)