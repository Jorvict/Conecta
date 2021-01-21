<?php
require_once 'Conexion.php';

class Pedido {
    private $cnx;
    public $idPed,$idCli,$idProd,$cantidad,$fecha,$comments;

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
        $sql = "SELECT ped.IdPedido,prod.NomProducto,CONCAT(c.Nombre,' ',c.Apellido) AS NombreCompleto,ped.Cantidad,ped.Fecha,c.Telefono,c.Direccion,ped.Comentarios
                FROM pedidos ped INNER JOIN productos prod ON ped.IdProducto = prod.IdProducto
                INNER JOIN clientes c ON ped.IdCliente = c.IdCliente
                WHERE prod.RucEmpresa = '{$ruc}' AND ped.Estado = true AND ped.Vendido = false;";
        return $this->cnx->query($sql,PDO::FETCH_ASSOC)->fetchAll();
    }
    function eliminarPedido(int $idPed) {
        $sql = "UPDATE `pedidos` SET `Estado` = false WHERE `IdPedido` = {$idPed};";
        return $this->cnx->query($sql);
    }
}
?>