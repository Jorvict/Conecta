let urlCats = "../index.php?controller=categoria&action=listarCategorias";
let data = {
	type: "cuadros",
};
$(".contentCats").load(urlCats, data, () => {
	$(".contentCats").on("click", ".cuadros", function () {
		empresasByCategoria($(this)[0]);
	});
});
$(".contentEmps").on("click", ".cuadros", function () {
    let url = $(this)[0].getElementsByTagName("input")[0].value;
	$.ajax({
		type: "GET",
		url: url,
		success: function () {
			location.href = "empresa.php";
		},
	});
});
