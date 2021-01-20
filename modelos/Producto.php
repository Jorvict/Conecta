<?php
require_once 'Conexion.php';

class Producto {
    private $cnx;
    public int $idProducto;
    public $rucEmpresa,$nomProducto,$descripcion,$precio,$medida,$stock,$imagen;

    function __construct($rucEmpresa=null,$nomProducto=null,$descripcion=null,$precio=null,$medida=null,$stock=null,$imagen=null,$idProducto = 0)
    {
        $this->idProducto = $idProducto;
        $this->rucEmpresa = $rucEmpresa;
        $this->nomProducto = $nomProducto;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->medida = $medida;
        $this->stock = $stock;
        $this->imagen = $imagen;
        $this->cnx = Conexion::conectar();
    }
    function productosByRuc(string $ruc){
        $sql = "call productosByRuc(?);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($ruc));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function agregarProducto(Producto $p){
        $sql = "call agregarProducto(?,?,?,?,?,?);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(1,$p->rucEmpresa,PDO::PARAM_STR,11);
        $stmt->bindParam(2,$p->nomProducto,PDO::PARAM_STR);
        $stmt->bindParam(3,$p->descripcion,PDO::PARAM_STR);
        $stmt->bindParam(4,$p->precio);
        $stmt->bindParam(5,$p->medida,PDO::PARAM_STR);
        $stmt->bindParam(6,$p->stock,PDO::PARAM_INT);
        return $stmt->execute();
    }
    function editarProducto(Producto $p){
        $sql = "call editarProducto(?,?,?,?,?,?);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(1,$p->idProducto,PDO::PARAM_INT);
        $stmt->bindParam(2,$p->nomProducto,PDO::PARAM_STR);
        $stmt->bindParam(3,$p->descripcion,PDO::PARAM_STR);
        $stmt->bindParam(4,$p->precio);
        $stmt->bindParam(5,$p->medida,PDO::PARAM_STR);
        $stmt->bindParam(6,$p->stock,PDO::PARAM_INT);
        return $stmt->execute();
    }
    function eliminarProducto(int $idProd){
        $sql = "call eliminarProducto({$idProd});";
        return $this->cnx->query($sql);
    }
}