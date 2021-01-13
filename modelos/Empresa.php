<?php
require_once 'Conexion.php';

class Empresa {
    private $cnx;
    public $email,$clave,$ruc,$negocio,$direccion,$titular,$celular;
    public int $id,$id_categoria;

    function __construct($email = null,$clave = null,$ruc = null,$negocio = null,$id_categoria = 0,$direccion = null,$titular = null,$celular = null)
    {
        $this->email = $email;
        $this->clave = $clave;
        $this->ruc = $ruc;
        $this->negocio = $negocio;
        $this->id_categoria = $id_categoria;
        $this->direccion = $direccion;
        $this->titular = $titular;
        $this->celular = $celular;
        $this->cnx = Conexion::conectar();
    }
    function registrarEmpresa(Empresa $e){
        $sql = 'call registrarEmpresa(?,?,?,?,?,?,?,?)';
        $stmt = $this->cnx->prepare($sql);

        $stmt->bindParam(1,$e->email, PDO::PARAM_STR);
        $password = password_hash($e->clave,PASSWORD_DEFAULT);
        $stmt->bindParam(2,$password);
        $stmt->bindParam(3,$e->ruc, PDO::PARAM_STR, 11);
        $stmt->bindParam(4,$e->negocio, PDO::PARAM_STR);
        $stmt->bindParam(5,$e->id_categoria, PDO::PARAM_INT);
        $stmt->bindParam(6,$e->direccion, PDO::PARAM_STR);
        $stmt->bindParam(7,$e->titular, PDO::PARAM_STR);
        $stmt->bindParam(8,$e->celular, PDO::PARAM_STR, 9);

        return $stmt->execute();
    }
    function loginEmpresa(string $email,string $clave){
        $sql = "select * from empresas where emailEmp = '{$email}' and Estado = true";
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
        return $stmt->rowCount();       
    }
    function listarCategorias(){
        $sql = "select * from categorias";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>