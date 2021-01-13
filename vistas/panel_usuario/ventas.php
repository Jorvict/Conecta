<?php
include 'header.php';
?>

<body class="body">
  <div class="page-container">
    <?php include 'menu.html'; ?>
    <main class="main">
      <?php include 'superior.php'; ?>

      <section class="contenido ventas">
        <div class="space">
          <div class="titulo">
            <div class="cont-titulo">
              <h3>
                Ventas
              </h3>
            </div>
          </div>

          <div class="buscador">
            <label for="pedidos">
              Buscar: <br> <input type="text" name="pedidos">
            </label>
          </div>

          <div class="table-container">
            <table>
              <!-- Cabecera de tabla -->
              <thead>
                <tr>
                  <th>Nombre completo del cliente</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Monto</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <!-- Cuerpo de tabla -->
              <tr class="first-row">
                <td>Jose Ramirez</td>
                <td>Zapato Nike Air</td>
                <td>2</td>
                <td>S/ 350</td>
                <td>S/ 750</td>
                <td>07-01-2020</td>
              </tr>

              <tr>
                <td>Marco García</td>
                <td>Laptop Acer Nitro 5</td>
                <td>1</td>
                <td>S/ 2100</td>
                <td>S/ 2100</td>
                <td>07-01-2020</td>
              </tr>

              <tr>
                <td>Emily Barreto</td>
                <td>Guante de Box Everlast</td>
                <td>2</td>
                <td>S/ 75</td>
                <td>S/ 150</td>
                <td>07-01-2020</td>
              </tr>

              <tr>
                <td>Andrea Rojas</td>
                <td>Smartv Samsung</td>
                <td>1</td>
                <td>S/ 3499</td>
                <td>S/ 3499</td>
                <td>07-01-2020</td>
              </tr>

              <tr>
                <td>Julio Prieto</td>
                <td>PlayStation 5</td>
                <td>5</td>
                <td>S/ 2600</td>
                <td>S/ 13000</td>
                <td>07-01-2020</td>
              </tr>
            </table>
          </div>

          <div class="items">
            <a href="#" class="items__1"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="items__1">1</a>
            <a href="#" class="items__1">2</a>
            <a href="#" class="items__1"><i class="fas fa-chevron-right"></i></a>
          </div>
        </div>

      </section>
    </main>
  </div>

  <script type="text/javascript" src="./js/menu.js"></script>
</body>

</html>