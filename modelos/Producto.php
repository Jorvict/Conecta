<?php
require_once 'Conexion.php';

class Producto {
    private $cnx;
    public int $idProducto,$stock;
    public $rucEmpresa,$nomProducto,$descripcion,$precio,$imagen;

    function __construct($rucEmpresa=null,$nomProducto=null,$descripcion=null,$precio=null,$stock=null,$imagen=null)
    {
        $this->$rucEmpresa = $rucEmpresa;
        $this->$nomProducto = $nomProducto;
        $this->$descripcion = $descripcion;
        $this->$precio = $precio;
        $this->$stock = $stock;
        $this->$imagen = $imagen;
        $this->cnx = Conexion::conectar();
    }
    function productosByRuc(string $ruc){
        $sql = "call productosByRuc(?);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($ruc));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}