let urlEmpImgs = "../index.php?controller=categoria&action=empresasByCategoria",
	ruc = $("#t-principal h3").text(),
	data = {
		type: "imgs",
		idCat: $("#docker-imgs").find("input").val(),
		ruc: ruc,
	};
$("#docker-imgs").load(urlEmpImgs, data, function () {
	$(".dck-img-container").click(function () {
		// Redirigir a otra empresa (ajax)
	});
});
let urlProds =
	"../index.php?controller=producto&action=productosByRuc&ruc=" + ruc;
$("#products-container").load(urlProds, { type: "article" }, function () {
    const productButton = document.querySelector('.btn-product');
    productButton.addEventListener('click', ShowProduct)
});
