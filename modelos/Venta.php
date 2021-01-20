<?php
require_once 'Conexion.php';

class Venta {
    private $cnx;

    function __construct()
    {
        $this->cnx = Conexion::conectar();
    }
    function showVentasByRuc($ruc) {
        $sql = "call showVentasByRuc('{$ruc}');";
        return $this->cnx->query($sql,PDO::FETCH_ASSOC)->fetchAll();
    }
    function confirmarVenta($idPed) {
        $sql = "call agregarVenta({$idPed});";
        return $this->cnx->query($sql);
    }
}
?>