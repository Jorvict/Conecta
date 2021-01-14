<?php
include 'header.php';
?>

<body class="body">
  <!-- Formulario ver pedido -->
  <div class="form-container">
    <form action="" class="frm-product" onsubmit="return false">
      <div class="close-container">
        <span class="close-title">Ver pedido</span>
        <span class="close-button">x</span>
      </div>

      <div class="body-frm-container">
        <figure class="img-container">
          <img src="../../public/imagenes/categorias/abarrote.jpg" alt="">
        </figure>

        <div class="comments-container">
          <div class="comments-title-container">
            <h3 class="comments-title">Teléfono:</h3>
          </div>
          <input type="text">
          <div class="comments-title-container">
            <h3 class="comments-title">Dirección:</h3>
          </div>
          <input type="text">
          <div class="comments-title-container">
            <h3 class="comments-title">Comentarios:</h3>
          </div>
          <textarea name="" id="" cols="30" rows="3"></textarea>
          <div class="buttons-container">
            <button class="btn-cancelar"><i class="fas fa-times"></i>Cancelar</button>
            <button class="btn-confirmar"><i class="fas fa-check"></i>Atender</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="page-container">
    <?php include 'menu.html'; ?>
    <main class="main">
      <?php include 'superior.php'; ?>
      <section class="contenido">
        <div class="space">
          <div class="titulo">
            <div class="cont-titulo">
              <h3>
                Pedidos
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
                  <th>Nombre del producto</th>
                  <th>Nombre completo del cliente</th>
                  <th>Cantidad</th>
                  <th>Fecha</th>
                  <th>Botón ver</th>
                  <th>Botón eliminar</th>
                </tr>
              </thead>
              <!-- Cuerpo de tabla -->
              <tr class="first-row">
                <td>Zapato Nike Air</td>
                <td>Jose Ramirez</td>
                <td>2</td>
                <td>07-01-2020</td>
                <td class="btn-ver-cont"><button class="check-order"><i class="far fa-eye"></i></button></td>
                <td class="btn-ver-cont"><button class="delete"><i class="fas fa-trash-alt"></i></button></td>
              </tr>

              <tr>
                <td>Laptop Acer Nitro 5</td>
                <td>Marco García</td>
                <td>1</td>
                <td>07-01-2020</td>
                <td class="btn-ver-cont"><button class="check-order"><i class="far fa-eye"></i></button></td>
                <td class="btn-ver-cont"><button class="delete"><i class="fas fa-trash-alt"></i></button></td>
              </tr>

              <tr>
                <td>Guante de Box Everlast</td>
                <td>Emily Barreto</td>
                <td>2</td>
                <td>07-01-2020</td>
                <td class="btn-ver-cont"><button class="check-order"><i class="far fa-eye"></i></button></td>
                <td class="btn-ver-cont"><button class="delete"><i class="fas fa-trash-alt"></i></button></td>
              </tr>

              <tr>
                <td>Smartv Samsung</td>
                <td>Andrea Rojas</td>
                <td>1</td>
                <td>07-01-2020</td>
                <td class="btn-ver-cont"><button class="check-order"><i class="far fa-eye"></i></button></td>
                <td class="btn-ver-cont"><button class="delete"><i class="fas fa-trash-alt"></i></button></td>
              </tr>

              <tr>
                <td>PlayStation 5</td>
                <td>Julio Prieto</td>
                <td>5</td>
                <td>07-01-2020</td>
                <td class="btn-ver-cont last"><button class="check-order"><i class="far fa-eye"></i></button></td>
                <td class="btn-ver-cont last"><button class="delete"><i class="fas fa-trash-alt"></i></button></td>
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
  <?php include 'footer.php'; ?>