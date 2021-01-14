<?php
require_once 'controladores/EmpresaController.php';
$e = new EmpresaController();
if (@$_GET['f']) {
    $f = $_GET['f'];
    $result = $e->$f();
    if (is_array($result)) {
        if (count($result) > 2) {
            session_start();
            $_SESSION['empresa'] = $result;
            if (ctype_digit($result['Distrito'])) {
                $_SESSION['ubicacion'] = ($e->DepProvByDistrito((int)$result['Distrito']));
            }
        }
        echo json_encode($_SESSION['empresa']);
    } else {
        echo $result;
    }
} else {
    $e->index();
}
?>