<?php
require_once 'Conexion.php';

class Producto {
    private $cnx;
    public $idProducto,$rucEmpresa,$nomProducto,$descripcion,$precio,$medida,$stock,$imagen,$ImagenUrl;

    function __construct($rucEmpresa=null,$nomProducto=null,$descripcion=null,$precio=null,$medida=null,$stock=null,$imagen=null,$ImagenUrl=null,$idProducto = 0)
    {
        $this->idProducto = $idProducto;
        $this->rucEmpresa = $rucEmpresa;
        $this->nomProducto = $nomProducto;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->medida = $medida;
        $this->stock = $stock;
        $this->imagen = $imagen;
        $this->ImagenUrl = $ImagenUrl;
        $this->cnx = Conexion::conectar();
    }
    function productosByRuc(string $ruc){
        $sql = "SELECT * FROM `productos` WHERE `RucEmpresa` = ? AND `Estado` = true;";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute(array($ruc));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //here function new product
    function agregarProducto(Producto $p){
        $sql = "INSERT INTO `productos`(`RucEmpresa`,`NomProducto`,`Descripcion`,`Precio`,`Medida`,`Stock`,`Imagen`,`ImagenUrl`)
                VALUES(?,?,?,?,?,?,?,?);";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(1,$p->rucEmpresa,PDO::PARAM_STR,11);
        $stmt->bindParam(2,$p->nomProducto,PDO::PARAM_STR);
        $stmt->bindParam(3,$p->descripcion,PDO::PARAM_STR);
        $stmt->bindParam(4,$p->precio);
        $stmt->bindParam(5,$p->medida,PDO::PARAM_STR);
        $stmt->bindParam(6,$p->stock,PDO::PARAM_INT);
        $stmt->bindParam(7,$p->imagen,PDO::PARAM_STR);
        $stmt->bindParam(8,$p->ImagenUrl,PDO::PARAM_STR);
        return $stmt->execute();
    }
    function editarProducto(Producto $p){
        $sql = "UPDATE `productos` SET `NomProducto` = ?,`Descripcion` = ?,`Precio` = ?,`Medida` = ?,`Stock` = ?
                WHERE `IdProducto` = ?;";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(1,$p->nomProducto,PDO::PARAM_STR);
        $stmt->bindParam(2,$p->descripcion,PDO::PARAM_STR);
        $stmt->bindParam(3,$p->precio);
        $stmt->bindParam(4,$p->medida,PDO::PARAM_STR);
        $stmt->bindParam(5,$p->stock,PDO::PARAM_INT);
        $stmt->bindParam(6,$p->imagen,PDO::PARAM_INT);
        return $stmt->execute();
    }
    function eliminarProducto(int $idProd){
        $sql = "UPDATE `productos` SET `Estado` = false WHERE `IdProducto` = {$idProd};";
        return $this->cnx->query($sql);
    }
}
