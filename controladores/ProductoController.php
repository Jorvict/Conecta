<?php
require_once 'modelos/Producto.php';

class ProductoController {
    private $modelo;

    function __construct()
    {
        $this->modelo = new Producto();
    }
    function productosByRuc(){
        $prods = $this->modelo->productosByRuc($_GET['ruc']);
        if (isset($_POST['type'])) {
            
            $articles = '';
            //AQUI HE AGREGADO BR PARA AGREGAR ESPACIO
            foreach ($prods as $p) {
                $iganes = $p['ImagenUrl'];
                $articles .= "<article class='product'>
                                <figure class='img-product'>
                                    ´<img src='.$iganes' alt='Imagen del Producto'>´
                                </figure>
                                <br>
                                <h4 class='subtitulo-product'>
                                    ".$p['NomProducto']."
                                </h4>
                                <p class='product-desc'>
                                    ".$p['Precio']."
                                </p>
                                <div class='button-container'>
                                    <input type='text' value='".$p['IdProducto']."' hidden>
                                    <button class='btn-product'>
                                        Ver producto
                                    </button>
                                </div>
                            </article>";
            }
            return $articles;
        } else {
            return $prods;
        }
        
    }
    //here funtion for add new product and your image
    function agregarProducto(){
        $ruc = $_POST['ruc'];
        $imagenName = $_FILES['file']['name'];
        
        //-------- MODIFIED NAME --------------
        $extension = pathinfo($imagenName, PATHINFO_EXTENSION);
        $random = rand(0,99);
        $rename = $random.date('Ymd').$imagenName;
        $newname = $rename;
        //for obtain extension of image .'.'.$extension
        $imageurl = "./vistas/panel_usuario/imgproducts/" . $newname;

        $imagenTemp = $_FILES['file']['tmp_name'];
        move_uploaded_file($imagenTemp, $imageurl);
        //copy($imagenTemp,$imagenUrl);

        $imagen = $newname;
        $ImagenUrl = $imageurl;
        //end my code add


        $nombre = trim($_POST['nombre']);
        $descripcion = trim($_POST['descripcion']);
        $precio = $_POST['precio'];
        $medida = $_POST['medida'];
        $stock = (int)$_POST['cantidad'];
        if (empty($nombre) || empty($descripcion) || $stock == 0) {
            return ['msg' => 'Datos incorrectos o incompletos','icon' => 'error', 'btnText' => 'Volver a intentar'];
        }
        $p = new Producto($ruc,$nombre,$descripcion,$precio,$medida,$stock,$imagen,$ImagenUrl);
        return ($this->modelo->agregarProducto($p)) ? 
                ['msg' => 'Nuevo producto agregado', 'icon' => 'success', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo agregar el nuevo producto', 'icon' => 'error', 'btnText' => 'Volver a intentar'];
    }
    ///////////////////////////7edid productttttttttttttt//////////////7
    
    function editarProducto(){
        $idProducto = (int)$_POST['id'];
        $ruc = $_POST['ruc'];
        $nombre = trim($_POST['nombre']);
        $descripcion = trim($_POST['descripcion']);
        $precio = $_POST['precio'];
        $medida = $_POST['medida'];
        $stock = (int)$_POST['cantidad'];
        $imagen = "nameimage";
        $ImagenUrl = "urlimage";
        if (empty($nombre) || empty($descripcion) || $stock == 0) {
            return ['msg' => 'Datos incorrectos o incompletos','icon' => 'error', 'btnText' => 'Volver a intentar'];
        }
        $p = new Producto($ruc,$nombre,$descripcion,$precio,$medida,$stock,$imagen,$ImagenUrl,$idProducto);
        return ($this->modelo->editarProducto($p)) ? 
                ['msg' => 'Información del producto actualizada', 'icon' => 'success', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo editar el producto', 'icon' => 'error', 'btnText' => 'Volver a intentar'];
    }



    function eliminarProducto(){
        $id = (int)$_POST['idProd'];
        //here add function for eliminate image
        $eliminarimage = "./vistas/panel_usuario/imgproducts/" . $_POST['Imagen'];
        unlink($eliminarimage);
        return ($this->modelo->eliminarProducto($id) != false) ? 
                ['msg' => 'Producto eliminado', 'icon' => 'info', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo eliminar el producto', 'icon' => 'error', 'btnText' => 'Volver a intentar'];

    }
}