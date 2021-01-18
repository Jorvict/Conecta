let nuevo__producto = document.getElementById("nuevoProducto");
let cancelar = document.getElementById("cancelar");

nuevo__producto.addEventListener("click", () => {
	actionForm("abrir", "nuevo");
});
cancelar.addEventListener("click", () => {
	actionForm("cerrar");
});
function actionForm(action, type) {
	console.log("Hola");
	let bloque = document.getElementById("bloque");
	let h1 = bloque.getElementsByTagName("h1")[0];
	if (action == "abrir") {
		bloque.classList.add("display__nuevo");
	} else {
		bloque.classList.remove("display__nuevo");
		$("#formProducto")[0].reset();
	}
	if (type == "editar") {
		$(h1).css("background-color", "orange");
		h1.textContent = "Editar Producto";
	} else {
		$(h1).css("background-color", "rgb(0, 158, 251)");
		h1.textContent = "Nuevo Producto";
	}
}

$(function () {
	let tableProd = $("#productosTabla").DataTable({
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
				data: null,
				targets: -2,
				defaultContent:
					'<button class="editar_b"><i class="fas fa-edit editar"></i></button>',
			},
		],
		// initComplete: function () {
		//
		// },
	});
	$("#cantidad").keydown(validateNumber);
	$("#precio").keydown((e) => {
		return (e.keyCode || e.which) == 190 || validateNumber(e);
	});
	$("#productosTabla tbody").on("click", ".editar_b", function () {
		actionForm("abrir", "editar");
		let data = tableProd.row($(this).parents("tr")).data();
		$("#idProd").val(data["IdProducto"]);
		$("#nombre").val(data["NomProducto"]);
		$("#cantidad").val(data["Stock"]);
		$("#medida").val(data["Medida"]);
		$("#precio").val(data["Precio"]);
		$("#descripcion").val(data["Descripcion"]);
	});
	$("#productosTabla tbody").on("click", ".eliminar_b", function () {
		let idProd = tableProd.row($(this).parents("tr")).data()["IdProducto"];
		Swal.fire({
			icon: "question",
			title: "¿Está seguro que desea eliminar este producto?",
			confirmButtonText: "Sí",
			showCancelButton: true,
			cancelButtonText: "No",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "../../index.php?controller=producto&action=eliminarProducto",
					data: {
						idProd: idProd,
					},
					success: function (response) {
						let json = JSON.parse(response);
						Swal.fire({
							icon: json.icon,
							title: json.msg,
							confirmButtonText: json.btnText,
						}).then(() => {
							if (json.icon == "success") {
								$("#productosTabla").DataTable().ajax.reload(null, false);
							}
						});
					},
				});
			}
		});
	});
});
$("#formProducto").submit(() => {
	const url =
			"../../index.php?controller=producto&action=" +
			($("#bloque h1").text() == "Nuevo Producto" ? "agregar" : "editar") +
			"Producto",
		parametros = {
			ruc: $("#rucSuperior").val(),
			id: $("#idProd").val(),
			nombre: $("#nombre").val(),
			cantidad: $("#cantidad").val(),
			medida: $("#medida").val(),
			precio: $("#precio").val(),
			descripcion: $("#descripcion").val(),
		};

	$.ajax({
		type: "POST",
		url: url,
		data: parametros,
		success: function (response) {
			let json = JSON.parse(response);
			Swal.fire({
				icon: json.icon,
				title: json.msg,
				confirmButtonText: json.btnText,
			}).then(() => {
				if (json.icon == "success") {
					actionForm("cerrar");
					$("#productosTabla").DataTable().ajax.reload(null, false);
				}
			});
		},
	});
	return false;
});
