<?php
session_start();
if (!isset($_SESSION['empresa'])) {
  header('Location: ../../vistas/index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/pedidos.css" />
  <link rel="stylesheet" href="css/form-pedido.css">
  <link rel="stylesheet" href="css/datos.css">
  <link rel="stylesheet" href="css/producto.css">

  <script src="https://kit.fontawesome.com/c702fce202.js" crossorigin="anonymous"></script>

</head>