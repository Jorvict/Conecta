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
        if (empty($this->modelo->buscarByRuc($ruc))) {
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
    function listarDepartamentos(){
        $departamentos = $this->modelo->listarDepartamentos();
        $options = '<option value="0">Seleccione un departamento...</option>';
        foreach ($departamentos as $dep) {
            $selected = ($_GET['phpDep'] == $dep['IdDepartamento']) ? ' selected' : '';
            $options.= '<option value='.$dep['IdDepartamento'].$selected.'>'.$dep['Departamento'].'</option>';
        }
        return $options;
    }
    function listarProvincias(){
        $idDep = $_GET['idDep'];
        $provincias = $this->modelo->listarProvincias($idDep);
        $options = '';
        foreach ($provincias as $prov) {
            $selected = ($_GET['phpProv'] == $prov['IdProvincia']) ? ' selected' : '';
            $options.= '<option value='.$prov['IdProvincia'].$selected.'>'.$prov['Provincia'].'</option>';
        }
        return $options;
    }
    function listarDistritos(){
        $idProv = $_GET['idProv'];
        $distritos = $this->modelo->listarDistritos($idProv);
        $options = '';
        foreach ($distritos as $dist) {
            $selected = ($_GET['phpDist'] == $dist['IdDistrito']) ? ' selected' : '';
            $options.= '<option value='.$dist['IdDistrito'].$selected.'>'.$dist['Distrito'].'</option>';
        }
        return $options;
    }
    function actualizarDatos(){
        $e = new Empresa();
        $e->ruc = $_POST['ruc'];
        $e->emailEmp = str_replace(" ","",$_POST['email']);
        $e->descripcion = trim($_POST['descripcion']);
        $e->direccion = trim($_POST['direccion']);
        $e->distrito = (int)$_POST['distrito'];
        $e->telefono = $_POST['telefono'];
        $e->whatsapp = $_POST['whatsapp'];
        $e->facebook = trim($_POST['facebook']);
        $e->instagram = trim($_POST['instagram']);
        if (empty($e->descripcion) || empty($e->direccion) || (int)$_POST['departamento'] == 0 || strlen($e->telefono) != 9 || strlen($e->whatsapp) > 9) {
            return ['bool' => false, 'msg' => 'datosIncorrectos'];
        }
        return ($this->modelo->actualizarEmpresa($e)) ?
                $this->modelo->buscarByRuc($e->ruc) :
                ['bool' => true, 'msg' => 'problemaSQL'];
    }
    function DepProvByDistrito(int $distrito){
        return $this->modelo->DepProvByDistrito($distrito);
    }
}
?>