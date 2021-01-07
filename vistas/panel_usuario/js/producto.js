let nuevo__producto = document.getElementById("nuevoProducto")
let cancelar = document.getElementById("cancelar")

nuevo__producto.addEventListener("click", () => {

    let bloque = document.getElementById("bloque")
    bloque.classList.add("display__nuevo")
})

cancelar.addEventListener("click", () => {
    let bloque = document.getElementById("bloque")
    bloque.classList.remove("display__nuevo")
})





let icono__editar = document.getElementById("icono__editar")
let cancelar__editar = document.getElementById("cancelar__editar")

icono__editar.addEventListener("click", () => {

    let bloque = document.getElementById("bloque__editar")
    bloque.classList.add("display__nuevo")
})

cancelar__editar.addEventListener("click", () => {
    let bloque = document.getElementById("bloque__editar")
    bloque.classList.remove("display__nuevo")
})