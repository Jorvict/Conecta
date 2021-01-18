<?php
require_once 'Conexion.php';

class Empresa {
    private $cnx;
    public $emailPers,$clave,$ruc,$nomEmp,$direccion,$titular,$telefono,$descripcion,$logo,$emailEmp,$distrito,$whatsapp,$facebook,$instagram;
    public bool $estado;
    public int $id,$id_categoria;

    
    function __construct($emailPers = null,$clave = null,$ruc = null,$nomEmp = null,$id_categoria = 0,$direccion = null,$titular = null,$telefono = null)
    {
        $this->emailPers = $emailPers;
        $this->clave = $clave;
        $this->ruc = $ruc;
        $this->nomEmp = $nomEmp;
        $this->id_categoria = $id_categoria;
        $this->direccion = $direccion;
        $this->titular = $titular;
        $this->telefono = $telefono;
        $this->cnx = Conexion::conectar();
    }
    function registrarEmpresa(Empresa $e){
        $sql = 'call registrarEmpresa(?,?,?,?,?,?,?,?)';
        $stmt = $this->cnx->prepare($sql);

        $stmt->bindParam(1,$e->emailPers, PDO::PARAM_STR);
        $password = password_hash($e->clave,PASSWORD_DEFAULT);
        $stmt->bindParam(2,$password);
        $stmt->bindParam(3,$e->ruc, PDO::PARAM_STR, 11);
        $stmt->bindParam(4,$e->nomEmp, PDO::PARAM_STR);
        $stmt->bindParam(5,$e->id_categoria, PDO::PARAM_INT);
        $stmt->bindParam(6,$e->direccion, PDO::PARAM_STR);
        $stmt->bindParam(7,$e->titular, PDO::PARAM_STR);
        $stmt->bindParam(8,$e->telefono, PDO::PARAM_STR, 9);

        return $stmt->execute();
    }
    function loginEmpresa(string $email,string $clave){
        $sql = "select * from empresas where emailPers = '{$email}' and Estado = true";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        $empresa =  $stmt->fetch(PDO::FETCH_ASSOC);
        if (is_array($empresa)) {
            return (password_verify($clave,$empresa['Contrasena'])) ? $empresa : ['bool' => false, 'error' => 'datosIncorrectos'];
        } else {
            return ['bool' => false, 'error' => 'datosIncorrectos'];
        }        
    }
    function buscarByRuc(string $ruc){
        $sql = "select * from empresas where RucEmpresa = '{$ruc}'";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(); 
        return $stmt->fetch(PDO::FETCH_ASSOC);       
    }
    function listarCategorias(){
        $sql = "select * from categorias";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarDepartamentos(){
        $sql = "select * from departamentos";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarProvincias($idDep){
        $sql = "call provinciaByDepartamento(?);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($idDep));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarDistritos($idProv){
        $sql = "call distritoByProvincia(?);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($idProv));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function actualizarEmpresa(Empresa $e){
        $sql = "call actualizarEmpresa(?,?,?,?,?,?,?,?,?);";
        $stmt = $this->cnx->prepare($sql);

        $stmt->bindParam(1,$e->ruc, PDO::PARAM_STR,11);
        $stmt->bindParam(2,$e->emailEmp, PDO::PARAM_STR);
        $stmt->bindParam(3,$e->descripcion, PDO::PARAM_STR);
        $stmt->bindParam(4,$e->direccion, PDO::PARAM_STR);
        $stmt->bindParam(5,$e->distrito, PDO::PARAM_STR);
        $stmt->bindParam(6,$e->telefono, PDO::PARAM_STR,9);
        $stmt->bindParam(7,$e->whatsapp, PDO::PARAM_STR,9);
        $stmt->bindParam(8,$e->facebook, PDO::PARAM_STR);
        $stmt->bindParam(9,$e->instagram, PDO::PARAM_STR);

        return $stmt->execute();
    }
    function DepProvByDistrito($distrito){
        $sql = "call DepProvByDistrito(?);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($distrito));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
