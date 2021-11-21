<?php

require_once 'libs/Smarty.class.php';

class CategoriasView{

    function __construct(){}

   
    public function showCategorias($categorias, $error=null){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Categorias');
        $smarty->assign('list_categorias', $categorias);
        $smarty->assign('error', $error);
        $smarty->display('templates/categorias.tpl');
    }
    public function showUpdateCategoria($categoria){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Categorias');
        $smarty->assign('categoria', $categoria);
        $smarty->display('templates/categoria_actualizar.tpl');
    }

}