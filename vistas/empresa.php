<?php
$title = "";
include_once 'layouts/head.php'; ?>
<link rel="stylesheet" type="text/css" href="../public/css/product_services.css">
<link rel="stylesheet" href="../public/css/form-product.css">
</head>

<body>

	<div class="page-container">

		<?php include_once 'layouts/header.php'; ?>

		<div class="form-container-product">
			<section class="form-product">
				<!-- Barra left formulario -->
				<article class="header-form-product">
					<span class="close-button-product">x</span>
				</article>

				<article class="left">
					<div class="container-elements-left">
						<h2 class="title-mobile">Formulario de compra</h2>

						<div class="slider-container">
							<section class="slider">
								<div class="controls-container">
									<button class="control-previous-slider">
										<i class="fas fa-chevron-left"></i>
									</button>
									<button class="control-next-slider">
										<i class="fas fa-chevron-right"></i>
									</button>
								</div>
								<div id="carouselControls" class="carousel_slide" data-ride="carousel">
									<figure class="img-form-product">
										<img src="../public/imagenes/sliders/form-product/slider1.jpg" alt="">
									</figure>
									<figure class="img-form-product">
										<img src="../public/imagenes/sliders/form-product/slider2.jpg" alt="">
									</figure>
									<figure class="img-form-product">
										<img src="../public/imagenes/sliders/form-product/slider3.jpg" alt="">
									</figure>
								</div>
							</section>
						</div>

						<div class="description-form-product">
							<div class="container-elements-product">
								<h2>Costurería</h2>
								<p>Descripción Lorem ipsum dolor sit, amet consectetur adipisicing elit asieuxnal ksnda </p>
								<p class="price-container"><strong>Precio: </strong> S/ 14.99</p>
							</div>
						</div>
					</div>
				</article>

				<article class="right">
					<h2>Formulario de compra</h2>

					<div class="big-container">

						<div class="cont-item">
							<input type="text" placeholder="Nombre">
						</div>
						<div class="cont-item">
							<input type="text" placeholder="Apellido">
						</div>
						<div class="cont-item">
							<input type="text" placeholder="Cantidad">
						</div>
						<div class="cont-item">
							<input type="text" placeholder="Teléfono">
						</div>
						<div class="cont-item big">
							<input type="text" placeholder="Dirección">
						</div>
						<div class="cont-item big">
							<textarea name="comentarios" id="comentarios" cols="30" rows="4" placeholder="Escribe tu comentario aquí"></textarea>
						</div>
					</div>
					<div class="btn-container">
						<button class="enviar-venta">
							Adquirir
						</button>
					</div>
				</article>
			</section>
		</div>

		<section id="t-principal">
			<div class="space-title"></div>
			<h4 id="categoria">Butrich</h4>
		</section>

		<main>
			<figure class="img-container">
				<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Butrich/logo.png" alt="">
			</figure>
			<aside class="left-section">

				<article class="info-emp">
					<div class="container-sticky">
						<p class="description">
							Se presentó en eventos internacionales como el Mercedes Benz Fashion Week
							de Madrid (2013) y fue la invitada internacional en el IFLS en Bogotá (2016), así como
							finalista en el pitch to LAFS (Latin American Fashion Summit) en Cancún (2018).
						</p>
						<div class="social-section">
							<div class="social social-tlf">
								<i class="icon-phone"></i>
								(01)239-0070
							</div>
							<div class="social social-fb">
								<i class="icon-facebook"></i>
								@bernardosbrasa
							</div>
							<div class="social social-ig">
								<i class="icon-instagram"></i>
								@bernardosbrasa
							</div>
							<div class="social social-local">
								<i class="icon-location"></i>
								Av.Marchand #324 Mala,Lima,Peru
							</div>
						</div>
						<div class="recomendaciones">
							<h3 class="titulo">
								Tambien podría interesarte
							</h3>
							<div class="docker-imgs">
								<figure class="dck-img-container">
									<a href="">
										<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Renzo/logo.jpg" alt="">
									</a>
								</figure>
								<figure class="dck-img-container">
									<a href="">
										<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Capittana/logo.jpg" alt="">
									</a>
								</figure>
								<figure class="dck-img-container">
									<a href="">
										<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Sophie/logo.jpg" alt="">
									</a>
								</figure>
								<figure class="dck-img-container">
									<a href="">
										<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Peruvian_Flake/logo.jpg" alt="">
									</a>
								</figure>
							</div>
						</div>
					</div>

				</article>

			</aside>
			<section class="right-section">

				<h3 class="title-products">
					Productos
				</h3>

				<div class="products-container">
					<article class="product">
						<figure class="img-product">
							<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Butrich/costureria.jpg" alt="">
						</figure>
						<h4 class="subtitulo-product">
							Costurería
						</h4>
						<p class="product-desc">
							S/ 14.99
						</p>
						<div class="button-container">
							<button class="btn-product">
								Ver producto
							</button>
						</div>
					</article>

					<article class="product">
						<figure class="img-product">
							<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Butrich/confección.jpg" alt="">
						</figure>
						<h4 class="subtitulo-product">
							Confección
						</h4>
						<p class="product-desc">
							S/ 29.99
						</p>
						<div class="button-container">
							<button class="btn-product">
								Ver producto
							</button>
						</div>
					</article>

					<article class="product">
						<figure class="img-product">
							<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Butrich/telas.jpg" alt="">
						</figure>
						<h4 class="subtitulo-product">
							Venta de Telas
						</h4>
						<p class="product-desc">
							S/ 59.99
						</p>
						<div class="button-container">
							<button class="btn-product">
								Ver producto
							</button>
						</div>
					</article>

					<article class="product">
						<figure class="img-product">
							<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Butrich/tintorería.jpg" alt="">
						</figure>
						<h4 class="subtitulo-product">
							Tintorería
						</h4>
						<p class="product-desc">
							S/ 99.99
						</p>
						<div class="button-container">
							<button class="btn-product">
								Ver producto
							</button>
						</div>
					</article>

					<article class="product">
						<figure class="img-product">
							<img src="../public/imagenes/categorias-comercio/Ropa_textiles/Butrich/venta.jpg" alt="">
						</figure>
						<h4 class="subtitulo-product">
							Venta de Ropa
						</h4>
						<p class="product-desc">
							S/ 29.99
						</p>
						<div class="button-container">
							<button class="btn-product">
								Ver producto
							</button>
						</div>
					</article>
				</div>

				<div class="button-container">
					<button>
						Ver más
					</button>
				</div>
			</section>
		</main>

		<?php include_once 'layouts/footer.php'; ?>

	</div>

	<?php include_once 'layouts/scripts.php'; ?>
	<script type="text/javascript" src="../public/js/form-product.js"></script>
</body>

</html>