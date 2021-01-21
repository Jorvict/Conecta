<?php

use function PHPSTORM_META\type;

require_once 'modelos/Categoria.php';

class CategoriaController {
    private $modelo;

    function __construct()
    {
        $this->modelo = new Categoria();
    }
    function listarCategorias($type = 'option'){
        if ($_POST) {
            $type = $_POST['type'];
        }
        $categorias = $this->modelo->listarCategorias();
        $options = ($type == 'option') ? '<option value="0">Seleccione una categoría...</option>' : '';
        foreach ($categorias as $cat) {
            if ($type == 'option') {
                $options.= '<option value='.$cat['IdCategoria'].'>'.$cat['nombre'].'</option>';
            } else {
                $nomCat = $cat['nombre'];
                $nomImg = strtolower(str_replace('de','',str_replace('y','',str_replace(' ','_',$nomCat))));
                $urlImg = "../public/imagenes/categorias/".$nomImg.'.png';
                $idCat = $cat['IdCategoria'];
                $options .= "<div class='cuadros'>
                                <input type='text' value='{$idCat}' hidden>
                                <img id='img' src='{$urlImg}'>
                                <div class='hover-galeria'>
                                    <p>{$nomCat}</p>
                                </div>
                            </div>";
            }
        }
        return $options;
    }
    function empresasByCategoria(){
        $empresas = $this->modelo->empresasByCategoria($_POST['idCat']);
        $cuadros = '';
        foreach ($empresas as $emp) {
            $urlEmpresa = '../index.php?controller=categoria&action=showEmpresa&ruc='.$emp['RucEmpresa'];
            $nomEmp = $emp['NomEmpresa'];
            $cuadros .= "<div class='cuadros'>
                            <input type='text' class='urlEmp' value='{$urlEmpresa}' hidden>
                            <img id='img' src=''>
                            <div class='hover-galeria'>
                                <p>{$nomEmp}</p>
                            </div>
                        </div>";
        }
        session_start();
        $_SESSION['cuadrosEmps'] = $cuadros;
        $_SESSION['categoria'] = $_POST;
    }
}
?>