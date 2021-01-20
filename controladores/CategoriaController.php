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
                $urlCategoria = "./categoria.php";
                $options .= "<a href='{$urlCategoria}'>
                                <div class='cuadros'>
                                    <img id='img' src='{$urlImg}'>
                                    <div class='hover-galeria'>
                                        <p>{$nomCat}</p>
                                    </div>
                                </div>
                            </a>";
            }
        }
        return $options;
    }
}
?>