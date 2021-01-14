<?php
require_once 'controladores/EmpresaController.php';
$e = new EmpresaController();
if (@$_REQUEST['f']) {
    $f = $_GET['f'];
    $result = $e->$f();
    if (is_array($result)) {
        if (count($result) > 2) {
            session_start();
            $_SESSION['empresa'] = $result;
        }
        echo json_encode($result);
    } else {
        echo $result;
    }
} else {
    $e->index();
}
?>