let url = "../index.php?controller=categoria&action=listarCategorias";
let data = {
	type: "cuadros",
};
$("#contenedor").load(url, data);
