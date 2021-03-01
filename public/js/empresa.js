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
    //const productButton = document.querySelectorAll('.btn-product');
	//var idproducto = document.querySelectorAll("#idproducto");
	//for(var i=0; i<productButton.length; i++){		
		//console.log(productButton[i]);		
		//var  productId = productButton[i].getAttribute("data-id")
		//console.log(productId)
		//productButton[i].addEventListener('click', function(){			
			//ShowProduct(productId);
			//console.log(productId)
		//} );		
		//console.log((productId))
	//}
	/*var idproducto = document.querySelectorAll("#idproducto")
	for(var i=0; i<idproducto.length; i++){
		console.log((idproducto[i]).value);
	}*/
	const productsButton = document.querySelectorAll(
		'#products-container .btn-product'
	  );
	  for (let i = 0; i < productsButton.length; i++) {
		// console.log(
		//   productsButton[i]
		//     .closest('.button-container')
		//     .querySelector('input[type="text"')
		// );
		productsButton[i].addEventListener('click', (e) => {
		  /*console.log(
			e.target
			  .closest('.button-container')
			  .querySelector('input[type="text"'),
			e.target.closest('.button-container').querySelector('input[type="text"')
			  .value
		  );*/
		  				  

			var idmyprod = e.target.closest('.button-container').querySelector('input[type="text"').value
			$.ajax({				
				url: "../index.php?controller=producto&action=productosByid&idmyprod=" + idmyprod,
				
				success: function (data){
					var mydatos =JSON.parse(data);
					ShowProduct()
					console.log(mydatos)
					var IdProducto = mydatos[0]['IdProducto'];

					var nombre = mydatos[0]['NomProducto'];
					var descripcion = mydatos[0]['Descripcion'];
					var precio = mydatos[0]['Precio'];
					var miimagen = mydatos[0]['Imagen'];

					$(".minombre").prepend(nombre);
					$(".midescripcion").prepend(descripcion);
					$(".price-container").prepend('<strong>Precio S/. </strong>'+ precio);
					$('.mimagen1').attr("src", '../vistas/panel_usuario/imgproducts/'+miimagen);
					$('#IdProducto').val(IdProducto);
									

				}
				

			});
			  		

		 
		});
	  }

	
    
});

//here code for send  orders

$('#formVenta').submit(function(e){
	//e.preventDefault();
	let idProduct = $('#IdProducto').val();
	let nombres = $('#nombres').val();
	let apellido = $('#apellido').val();
	let cantidad  = $('#Cantidad').val();
	let telefono = $('#teléfono').val();
	let direccion  = $('#dirección').val();
	let comentario = $('#comentarios').val();


	var data = {
		idProduct: idProduct,
		nombres: nombres,
		apellido: apellido,
		cantidad: cantidad,
		telefono: telefono,
		direccion: direccion,
		comentario: comentario
	}
	console.log(data);
	$.ajax({
		url: "../index.php?controller=pedido&action=realizarPedido",
		type: "post",
		data: data,
		success: function(response){
			console.log(response);
			let json = JSON.parse(response);
			Swal.fire({
				icon: json.icon,
				title: json.msg,
				confirmButtonText: json.btnText,
			}).then(() => {
				if (json.icon == "success") {
					$(".minombre").empty();
					$(".midescripcion").empty();
					$(".price-container").empty();
					$('.mimagen1').empty();
					$('#IdProducto').empty();
					HideProduct();

					$("#formVenta").trigger('reset');
				}
			});

		},
	});
	return false;

});
