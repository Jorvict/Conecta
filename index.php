<?php
require_once 'controladores/EmpresaController.php';
require_once 'controladores/ProductoController.php';
require_once 'controladores/PedidoController.php';
$e = new EmpresaController();
$prod = new ProductoController();
$ped = new PedidoController();
if (isset($_GET['controller'])) {
    $a = $_GET['action'];
    switch ($_GET['controller']) {
        case 'empresa':
            $result = $e->$a();
            if (is_array($result)) {
                if (count($result) > 2) {
                    session_start();
                    $_SESSION['empresa'] = $result;
                    if (ctype_digit(@$result['Distrito'])) {
                        $_SESSION['ubicacion'] = ($e->DepProvByDistrito($result['Distrito']));
                    }
                }
            }
            break;
        case 'producto':
            $result = $prod->$a();
            break;
        case 'pedido':
            $result = $ped->$a();
    }
    echo (is_array($result)) ? json_encode($result) : $result;
} else {
    $e->index();
}
