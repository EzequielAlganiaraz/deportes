<?php

require_once 'libs/Smarty.class.php';

class CategoriasView{

    function __construct(){}

    public function ShowCategorias($categorias){

        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','categorias');
        $smarty->assign('list_categorias', $categorias);
        $smarty->display('templates/categorias.tpl');
    }


}