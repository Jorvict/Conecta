<div class="form-container">
	<form action="../vistas/panel_usuario/index.php" onsubmit="return CheckRegistro()" class="form-registro" method="POST">
		<h4>Registro</h4>
		<span class="close-button">x</span>

		<input class="controles" type="email" name="correo" id="correo" placeholder="Correo electrónico" required>

		<input class="controles" type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required>

		<input class="controles" type="text" name="ruc" id="ruc" placeholder="RUC del negocio" onkeydown="return validateNumber(event)" maxlength="11" required>

		<input class="controles" type="text" name="negocio" id="negocio" placeholder="Nombre del negocio" required>

		<select name="tip-categorias" id="tip-categorias" class="tip-categorias"></select>

		<input class="controles" type="text" name="direccion" id="direccion" placeholder="Dirección o referencia" required>

		<input class="controles" type="text" name="nombre" id="nombre" placeholder="Nombre del titular" required>

		<input class="controles" type="text" name="numero" id="numero" placeholder="Número de celular" onkeydown="return validateNumber(event)" maxlength="9" required>

		<div class="btn-container">
			<input class="boton" type="submit" value="REGISTRARSE">
		</div>
	</form>
</div>

<div class="login-container">
	<form action="../vistas/panel_usuario/index.php" onsubmit="return CheckLogin()" class="form-login" method="POST">
		<h4>Iniciar sesión</h4>
		<span class="close-button-login">x</span>

		<input class="controles" type="email" name="correologin" id="correologin" placeholder="Correo electrónico" required>
		<input class="controles" type="password" name="contrasenalogin" id="contrasenalogin" placeholder="Contraseña" required>

		<input class="boton" type="submit" value="INGRESAR">
	</form>
</div>

<header class="cabecera">
	<figure class="img-container" id="img-logo">
		<a href="./index.php">
			<img src="../public/imagenes/header/LOGO_FINAL.webp" alt="">
		</a>
		<i class="icon-menu burger-button"></i>
	</figure>
	<section class="right-sect">
		<section class="top">
			<div class="division first">
				<p>#OrgullososdeComprarleAlPerú</p>
			</div>
			<div class="division second">
				<p>¿Tienes un negocio? <br>
					Te ayudamos.</p>
			</div>
			<div class="division third">
				<button class="register">
					REGÍSTRATE <br>
					GRATIS
				</button>
			</div>
			<div class="division fourth">
				<figure class="img-container">
					<img id="img-login" src="../public/imagenes/header/home.gif" alt="">
				</figure>

				<button class="Login">
					Iniciar sesión
				</button>
			</div>
		</section>
		<section class="middle">
			<div class="input-container">
				<input type="text" placeholder="¿Qué estás buscando?">
				<i class="icon-search"></i>
			</div>
		</section>
		<section class="bottom">
			<nav class="menu">
				<ul>
					<a href="./index.php" class="first-nav">
						<li>Inicio</li>
					</a>
					<li class="first-nav parent">
						<a href="./categorias.php">Categorías</a>
						<ul>
							<div class="wrapper">
								<li class="lng-nav">
									<a href="">Ropa y textil</a>
								</li>
								<li class="lng-nav">
									<a href="">Abarrotes</a>
								</li>
								<li class="lng-nav">
									<a href="">Restaurantes</a>
								</li>
								<li class="lng-nav">
									<a href="">Salud</a>
								</li>
							</div>

							<div class="wrapper">
								<li class="lng-nav">
									<a href="">Pastelería</a>
								</li>
								<li class="lng-nav">
									<a href="">Cuero y calzado</a>
								</li>
								<li class="lng-nav">
									<a href="">Ferretería</a>
								</li>
								<li class="lng-nav">
									<a href="">Frutas y verduras</a>
								</li>
							</div>

							<div class="wrapper">
								<li>
									<a href="">Útiles de oficina</a>
								</li>
								<li>
									<a href="">Mascota</a>
								</li>
								<li>
									<a href="">Iluminación</a>
								</li>
								<li>
									<a href="">Decoración</a>
								</li>
								<li>
									<a href="">Otros</a>
								</li>
							</div>
						</ul>
					</li>
					<li class="first-nav">
						<a href="">¿Quíenes somos?</a>
					</li>
					<li class="first-nav">
						<a href="./contactanos.php">Contáctanos</a>
					</li>
				</ul>
			</nav>
		</section>
	</section>
</header>