<?php
require_once 'modelos/Empresa.php';

class EmpresaController {
    private $modelo;

    function __construct()
    {
        $this->modelo = new Empresa();
    }
    function index()
    {
        if (isset($_GET['cerrarSesion'])) {
            session_start();
            session_unset();
            session_destroy();
        }
        header('Location: vistas/index.html');
    }
    function login(){
        $email = trim($_POST['email']);
        $clave = trim($_POST['clave']);
        return $this->modelo->loginEmpresa($email,$clave);
    }
    function registro(){
        $email = str_replace(" ","",$_POST['email']);
        $clave = trim($_POST['clave']);
        $ruc = $_POST['ruc'];
        $negocio = trim($_POST['empresa']);
        $id_categoria = (int)$_POST['categoria'];
        $direccion = trim($_POST['direccion']);
        $titular = trim($_POST['titular']);
        $celular = $_POST['telefono'];
        if (empty($clave) || empty($negocio) || empty($direccion) || empty($titular) || ctype_digit($titular)
            || $id_categoria == 0 || strlen($ruc) != 11 || strlen($celular) != 9) {
            // DATOS INCORRECTOS
            return ['bool' => false, 'error' => 'datosIncorrectos'];
        }
        if ($this->modelo->buscarByRuc($ruc) == 0) {
            $empresa = new Empresa($email,$clave,$ruc,$negocio,$id_categoria,$direccion,$titular,$celular);
            return ($this->modelo->registrarEmpresa($empresa)) ?
                    $this->modelo->loginEmpresa($email,$clave) :
                    ['bool' => false, 'error' => 'problemaSQL'];
        } else {
            // RUC duplicado
            return ['bool' => false, 'error' => 'rucDuplicado'];
        }
    }
    function listarCategorias(){
        $categorias = $this->modelo->listarCategorias();
        $options = '<option value="0">Seleccione una categoría...</option>';
        foreach ($categorias as $cat) {
            $options.= '<option value='.$cat['IdCategoria'].'>'.$cat['nombre'].'</option>';
        }
        return $options;
    }
}
?>