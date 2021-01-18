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
}