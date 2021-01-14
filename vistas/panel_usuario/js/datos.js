let dep = $("#departamento"),
	prov = $("#provincia"),
	dist = $("#distrito");

dep.load(
	"../../index.php?f=listarDepartamentos&phpDep=" + $("#phpDepartamento").val(),
	function () {
		if ($(this).val() == 0) {
			prov.html('<option value="0">Seleccione una provincia...</option>');
			dist.html('<option value="0">Seleccione un distrito...</option>');
			prov.attr("disabled", true);
			dist.attr("disabled", true);
		} else {
			prov.removeAttr("disabled");
			dist.removeAttr("disabled");
			prov.load(
				"../../index.php?f=listarProvincias&idDep=" +
					$(this).val() +
					"&phpProv=" +
					$("#phpProvincia").val(),
				function () {
					dist.load(
						"../../index.php?f=listarDistritos&idProv=" +
							$(this).val() +
							"&phpDist=" +
							$("#phpDistrito").val()
					);
				}
			);
		}
	}
);

dep.change(function () {
	if ($(this).val() == 0) {
		prov.html('<option value="0">Seleccione una provincia...</option>');
		dist.html('<option value="0">Seleccione un distrito...</option>');
		prov.attr("disabled", true);
		dist.attr("disabled", true);
	} else {
		prov.removeAttr("disabled");
		dist.removeAttr("disabled");
		prov.load(
			"../../index.php?f=listarProvincias&idDep=" +
				$(this).val() +
				"&phpProv=" +
				$("#phpProvincia").val(),
			function () {
				dist.load(
					"../../index.php?f=listarDistritos&idProv=" +
						$(this).val() +
						"&phpDist=" +
						$("#phpDistrito").val()
				);
			}
		);
	}
});

prov.change(function () {
	dist.load(
		"../../index.php?f=listarDistritos&idProv=" +
			$(this).val() +
			"&phpDist=" +
			$("#phpDistrito").val()
	);
});

function validateNumber(event) {
	let unicode = event.keyCode || event.which;
	let correctKey =
		unicode == 8 ||
		unicode == 9 ||
		unicode == 116 ||
		(unicode >= 48 && unicode <= 57) || // Números
		(unicode >= 96 && unicode <= 105); // NumPad
	return correctKey;
}

function CheckDatos() {
	const url = "../../index.php?f=actualizarDatos",
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
			let json = JSON.parse(response);
			let msg, icon;
			switch (json.msg) {
				case "datosIncorrectos":
					msg = "Datos incorrectos o incompletos";
					icon = "error";
					break;
				case "problemaSQL":
					msg = "Hubo un problema en el registro";
					icon = "error";
					break;
				case "exito":
					msg = "Información de empresa actualizada";
					icon = "success";
					break;
			}
			Swal.fire({
				icon: icon,
				title: msg,
				confirmButtonText: icon == "error" ? "Volver a intentar" : "Continuar",
			});
		},
	});
}
$("#btnGuardar").click(function () {
	CheckDatos();
});
