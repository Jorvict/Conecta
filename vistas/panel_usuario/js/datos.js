let dep = $("#departamento"),
	prov = $("#provincia"),
	dist = $("#distrito");

function updateSelects() {
	if ($(this).val() == 0) {
		prov.html('<option value="0">Seleccione una provincia...</option>');
		dist.html('<option value="0">Seleccione un distrito...</option>');
		prov.attr("disabled", true);
		dist.attr("disabled", true);
	} else {
		prov.removeAttr("disabled");
		dist.removeAttr("disabled");
		prov.load(
			"../../index.php?controller=empresa&action=listarProvincias&idDep=" +
				$(this).val() +
				"&phpProv=" +
				$("#phpProvincia").val(),
			loadDistritos
		);
	}
}
function loadDistritos() {
	dist.load(
		"../../index.php?controller=empresa&action=listarDistritos&idProv=" +
			$(this).val() +
			"&phpDist=" +
			$("#phpDistrito").val()
	);
}

dep.load(
	"../../index.php?controller=empresa&action=listarDepartamentos&phpDep=" +
		$("#phpDepartamento").val(),
	updateSelects
);
dep.change(updateSelects);
prov.change(loadDistritos);


function CheckDatos() {
	const url = "../../index.php?controller=empresa&action=actualizarDatos",
		parametros = {
			ruc: $("#ruc").val(),
			emailPers: $("#emailPers").val(),
			email: $("#emailEmp").val(),
			clave: $("#clave").val(),
			descripcion: $("#descripcion").val(),
			distrito: $("#distrito").val(),
			departamento: $("#departamento").val(),
			telefono: $("#telefono").val(),
			direccion: $("#direccion").val(),
			whatsapp: $("#whatsapp").val(),
			facebook: $("#facebook").val(),
			instagram: $("#instagram").val(),
		};
	$.ajax({
		data: parametros,
		url: url,
		type: "POST",
		async: false,
		success: function (response) {
			let msg,
				icon,
				json = JSON.parse(response);
			result = json.bool;
			switch (json.msg) {
				case "datosIncorrectos":
					msg = "Datos incorrectos o incompletos";
					icon = "error";
					break;
				case "problemaSQL":
					msg = "Hubo un problema en el registro";
					icon = "error";
					break;
				default:
					msg = "Información de empresa actualizada";
					icon = "success";
					result = true;
					break;
			}
			Swal.fire({
				icon: icon,
				title: msg,
				confirmButtonText: icon == "error" ? "Volver a intentar" : "Continuar",
			});
		},
	});
	return false;
}
$("#formDatos").submit(CheckDatos);
