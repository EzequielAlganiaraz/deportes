<?php 
require_once "./view/CategoriasView.php";
require_once "./model/CategoriasModel.php";

class CategoriasController {

    private $view;
    private $model;

    function __construct(){
        $this->view = new CategoriasView();
        $this->model = new CategoriasModel();
    }


    function getCategorias(){
        $categorias = $this->model->getCategorias();
        $this->view->showCategorias($categorias);
    }

}

?>