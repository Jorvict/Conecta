<?php
require_once 'Conexion.php';

class Pedido {
    private $cnx;
    public int $idPed,$idCli,$idProd,$cantidad;
    public $fecha,$comments;

    function __construct($idCli = 0,$idProd = 0,$cantidad = 0,$comments = null)
    {
        $this->idCli = $idCli;
        $this->fecha = date('d-m-Y H:i:s');
        $this->idProd = $idProd;
        $this->cantidad = $cantidad;
        $this->comments = $comments;
        $this->cnx = Conexion::conectar();
    }
    function mostrarPedidosByRuc($ruc) {
        $sql = "call mostrarPedidosByRuc('{$ruc}');";
        return $this->cnx->query($sql,PDO::FETCH_ASSOC)->fetchAll();
    }
    function eliminarPedido(int $idPed) {
        $sql = "call eliminarPedido({$idPed});";
        return $this->cnx->query($sql);
    }
    function showVentasByRuc($ruc) {
        $sql = "call showVentasByRuc('{$ruc}');";
        return $this->cnx->query($sql,PDO::FETCH_ASSOC)->fetchAll();
    }
}
?>