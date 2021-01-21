let urlCats = "../index.php?controller=categoria&action=listarCategorias";
let data = {
	type: "cuadros",
};
$(".contentCats").load(urlCats, data, () => {
	$(".contentCats").on("click", ".cuadros", function() {
       empresasByCategoria($(this)[0]); 
    });
});
