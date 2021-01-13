<?php
include 'header.php';
?>

<body class="body">
  <?php include 'menu.html'; ?>
  <main class="main">
    <?php include 'superior.php'; ?>
    <section class="formulario">
      <form action="#" class="datos">
        <h1 class="datos__titulo">Mis datos</h1>
        <div class="datos">
          <input class="datos__form" type="text" placeholder="Nombre" name="nombre">

          <input class="datos__form" type="text" placeholder="Mi empresa" name="mi_empresa">
          <input class="datos__form" type="email" placeholder="Correo electrónico" name="email">
          <input class="datos__form" type="email" placeholder="Correo Corporativo" name="email_corporativo">
          <input class="datos__form" type="password" placeholder="Contraseña" name="contraseña">
          <input class="datos__form" type="number" placeholder="RUC" name="ruc">
          <div class="descripcion">
            <label for="descripcion">Descripción de tu tienda:</label><br>
            <textarea class="datos__form text_area" id="descripcion" name="descripcion">
          </textarea>
          </div>
          <div class="selectores">
            <div class="departamento">
              <label for="departamento">Departamento:</label><br>
              <select class="datos__form texto" id="departamento" name="departamento">
                <option value="LIMA">LIMA</option>
                <option value="ICA">ICA</option>
                <option value="LORETO">LORETO</option>
                <option value="PIURA">PIURA</option>
              </select>
            </div>
            <div class="provincia">
              <label for="provincia">Provincia:</label><br>
              <select class="datos__form texto" id="provincia" name="provincia ">
                <option value="LIMA">LIMA</option>
                <option value="ICA">ICA</option>
                <option value="CALLAO">CALLAO</option>
                <option value="PIURA">PIURA</option>
              </select>
            </div>
            <div class="distrito ">
              <label for="distrito">Distrito:</label><br>
              <select class="datos__form texto" id="distrito" name="distrito">
                <option value="PUENTE PIEDRA">PUENTE PIEDRA</option>
                <option value="LOS OLIVOS">LOS OLIVOS</option>
                <option value="ANCON">ANCON</option>
                <option value="CALLAO">CALLAO</option>
              </select>
            </div>
          </div>
          <input class="datos__form" type="text" placeholder="Direccion de empresa" name="direccion">
          <input class="datos__form" type="tel" placeholder="Teléfono" name="telefono">
          <input class="datos__form" type="tel" placeholder="Whatsapp" name="whatsapp">
          <input class="datos__form" type="url" placeholder="URL facebook" name="facebook">
          <input class="datos__form" type="url" placeholder="URL instagram" name="instagram">
          <section class="imagen">
            <figure class="imagen__logo">
              <img style="width: 70%;margin: 0 auto;display: block;" src="image/logo1.PNG" alt="logo" class="imagen__img1">
            </figure>
            <div class="indicacion">
              <p class="indicacion__texto">Sube tu logo en JPG o PNG, peso máximo de 1Mb. Tamaño sugerido 180 x 180
                pixeles.</p>
              <input class="indicacion__form datos__form" type="file" name="logo">
            </div>
          </section>
          <input class="imagen__submit" type="submit" value="Guardar datos">
        </div>
      </form>
    </section>
  </main>
  <script src="js/menu.js">

  </script>
</body>

</html>