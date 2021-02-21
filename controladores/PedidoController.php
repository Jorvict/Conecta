<?php
require_once 'modelos/Pedido.php';

class PedidoController {
    private $modelo;

    function __construct()
    {
        $this->modelo = new Pedido();
    }
    function mostrarPedidosByRuc() {
        return $this->modelo->mostrarPedidosByRuc($_GET['ruc']);
    }
    function eliminarPedido(){
        return ($this->modelo->eliminarPedido($_POST['idPed']) != false) ?
                ['msg' => 'Pedido eliminado', 'icon' => 'info', 'btnText' => 'Continuar'] :
                ['msg' => 'No se pudo eliminar el pedido', 'icon' => 'error', 'btnText' => 'Volver a intentar'];
    }
}
?>