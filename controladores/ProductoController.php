<?php
require_once 'modelos/Producto.php';

class ProductoController {
    private $modelo;

    function __construct()
    {
        $this->modelo = new Producto();
    }
    function productosByRuc(){
        return $this->modelo->productosByRuc($_GET['ruc']);
    }
    function agregarProducto(){
        $ruc = $_POST['ruc'];
        $nombre = trim($_POST['nombre']);
        $descripcion = trim($_POST['descripcion']);
        $precio = $_POST['precio'];
        $medida = $_POST['medida'];
        $stock = (int)$_POST['cantidad'];
        if (empty($nombre) || empty($descripcion) || $stock == 0) {
            return ['msg' => 'Datos incorrectos o incompletos','icon' => 'error', 'btnText' => 'Volver a intentar'];
        }
        $p = new Producto($ruc,$nombre,$descripcion,$precio,$medida,$stock);
        return ($this->modelo->agregarProducto($p)) ? 
                ['msg' => 'Nuevo producto agregado', 'icon' => 'success', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo agregar el nuevo producto', 'icon' => 'error', 'btnText' => 'Volver a intentar'];
    }
    function editarProducto(){
        $id = (int)$_POST['id'];
        $ruc = $_POST['ruc'];
        $nombre = trim($_POST['nombre']);
        $descripcion = trim($_POST['descripcion']);
        $precio = $_POST['precio'];
        $medida = $_POST['medida'];
        $stock = (int)$_POST['cantidad'];
        if (empty($nombre) || empty($descripcion) || $stock == 0) {
            return ['msg' => 'Datos incorrectos o incompletos','icon' => 'error', 'btnText' => 'Volver a intentar'];
        }
        $p = new Producto($ruc,$nombre,$descripcion,$precio,$medida,$stock,null,$id);
        return ($this->modelo->editarProducto($p)) ? 
                ['msg' => 'Información del producto actualizada', 'icon' => 'success', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo editar el producto', 'icon' => 'error', 'btnText' => 'Volver a intentar'];
    }
    function eliminarProducto(){
        $id = (int)$_POST['idProd'];
        return ($this->modelo->eliminarProducto($id) != false) ? 
                ['msg' => 'Producto eliminado', 'icon' => 'info', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo eliminar el producto', 'icon' => 'error', 'btnText' => 'Volver a intentar'];

    }
}