<?php
$title = "Contáctanos";
include_once 'layouts/head.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/index.css">
<link rel="stylesheet" type="text/css" href="../public/css/contactanos.css">
</head>

<body>
	<div class="page-container">

		<?php include_once 'layouts/header.php'; ?>

		<br>
		<section id="t-principal">
			<h4 id="categoria">Contáctanos</h4>
		</section>

		<main class="main__contacto">
			<form action="#" class="form">
				<input class="form__section sombra" type="text" name="nombre" placeholder="Nombres y Apellidos">
				<div class="form__section form__content">
					<input type="number" class="formSec__item margin" placeholder="DNI" name="dni">
					<input class="formSec__item" type="text" placeholder="Provincia/Distrito" name="provincia">
					<input type="email" class="formSec__item margin" name="email" placeholder="Email">
					<input class="formSec__item" type="number" name="telefono" placeholder="Teléfono">
				</div>
				<textarea class="form__section sombra" name="comentarios" cols="70" rows="10" style="height: 64px;" placeholder="Escribe tu comentario aquí"></textarea>

				<input class="form__section boton" type="submit" value="Enviar">

			</form>
		</main>

		<?php include_once 'layouts/footer.php'; ?>

	</div>

	<?php include_once 'layouts/scripts.php'; ?>

</body>

</html>