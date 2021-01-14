<?php
session_start();
if (!isset($_SESSION['empresa'])) {
  header('Location: ../../vistas/index.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/pedidos.css"/>
  <link rel="stylesheet" href="css/form-pedido.css">
  <script src="https://kit.fontawesome.com/c702fce202.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="">
</head>
  <body class="body">
    <div class="page-container">
      <header class="header">
        <div class="burger-button">
          <i class="fas fa-bars"></i>
        </div>
        <figure class="header__logo"><img class="header__img" src="image/logo1.PNG" alt="logo de la empresa"/></figure>
        <nav class="nav">
          <ul class="menu">
            <li class="menu__item"><a class="menu__link" href="./index.php"> <i class="fas fa-home icono"></i>Inicio</a></li>
            <li class="menu__item"><a class="menu__link" href="./datos.html"> <i class="fas fa-id-card-alt icono"></i>Mis datos</a></li>
            <li class="menu__item"><a class="menu__link" href="./producto.html"> <i class="fas fa-shopping-basket icono"></i></i>Productos</a></li>
            <li class="menu__item"><a class="menu__link" href="./pedidos.html"> <i class="fas fa-pen-square icono"></i>Pedidos</a></li>
            <li class="menu__item"><a class="menu__link" href="./ventas.html"> <i class="fas fa-file-invoice-dollar icono"></i>Ventas</a></li>
            <li class="menu__item"><a class="menu__link" href="../../index.php?cerrarSesion="> <i class="fas fa-door-open icono"></i>Salir</a></li>
          </ul>
        </nav>
      </header>
      <main class="main">
        <section class="menuHo initial">
          <figure class="menuHo__usuario">
            <div class="menuHo__usuarioSection">
            <img class="menuHo__img" src="image/usuario.jpg" alt="usuario" />
       
            <figcaption class="menuHo__nombre"><?php echo $_SESSION['empresa']['NomTitular'] ?><br><br><a class="ver__tienda2" href="#"><i class="fas fa-list-alt"></i> Ver tienda</a> </figcaption></div>
            <a class="ver__tienda1" href="#"><i class="fas fa-list-alt"></i> Ver tienda</a>
            
          </figure>
        </section>
        <section class="contenido"></section>
      </main>
    </div>

    <script type="text/javascript" src="./js/menu.js"></script>
  </body>
</html>