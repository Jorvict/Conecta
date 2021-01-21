<?php
require_once 'Conexion.php';

class Categoria {
    private $cnx;
    
    function __construct()
    {
        $this->cnx = Conexion::conectar();
    }
    function listarCategorias(){
        $sql = "select * from categorias";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function empresasByCategoria($idCat) {
        $sql = "call empresasByCategoria({$idCat});";
        return $this->cnx->query($sql,PDO::FETCH_ASSOC)->fetchAll();
    }
}
?>