$(function () {
	let table = $("#productosTabla").DataTable({
		language: {
			url: "js/spanish.json",
		},
		ajax: {
			url:
				"../../index.php?controller=producto&action=productosByRuc&ruc=" +
				$("#rucSuperior").val(),
			dataSrc: "",
		},
		columns: [
			{ data: "NomProducto" },
			{ data: "Stock" },
			{ data: "Precio" },
			{ data: null },
			{ data: null },
		],
		columnDefs: [
			{
				defaultContent:
					'<button class="eliminar_b"><i class="fas fa-trash-alt eliminar"></i></button>',
				targets: -1,
			},
			{
				targets: -2,
				defaultContent:
					'<button class="editar_b"><i class="fas fa-edit editar"></i></button>',
			},
		],
		initComplete: function () {
			addIconEvent();
		},
	});
});
let nuevo__producto = document.getElementById("nuevoProducto");
let cancelar = document.getElementById("cancelar");

nuevo__producto.addEventListener("click", () => {
	let bloque = document.getElementById("bloque");
	bloque.classList.add("display__nuevo");
});

cancelar.addEventListener("click", () => {
	let bloque = document.getElementById("bloque");
	bloque.classList.remove("display__nuevo");
});

function addIconEvent() {
	let icons__editar = $(".editar_b");
	for (let i = 0; i < icons__editar.length; i++) {
		icons__editar[i].addEventListener('click', () => {
			let bloque = document.getElementById("bloque__editar");
			bloque.classList.add("display__nuevo");
		});
	}
}
let cancelar__editar = document.getElementById("cancelar__editar");
cancelar__editar.addEventListener("click", () => {
	let bloque = document.getElementById("bloque__editar");
	bloque.classList.remove("display__nuevo");
});
