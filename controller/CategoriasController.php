<?php 
require_once "./view/CategoriasView.php";
require_once "./model/CategoriasModel.php";
require_once "./helpers/usuarioHelper.php";

class CategoriasController {

    private $view;
    private $model;
    private $helper;

    function __construct(){
        $this->view = new CategoriasView();
        $this->model = new CategoriasModel();
        $this->helper = new UsuarioHelper();
    }
    function showCategorias(){
        $categorias = $this->model->getCategorias();
        $this->view->showCategorias($categorias);
    }
    function getCategorias(){
        $this->helper->checkLoggedIn();
        $categorias= $this->model->getCategorias();
        return $categorias;
    }
    function deleteCategoria($id, $jugadores) {
        $this->helper->checkLoggedIn();  
        if($_SESSION['ADMINISTRADOR']==1){
            if(empty($jugadores)){
                $this->model->deleteCategoria($id);
                header("Location: " . BASE_URL . 'categorias');
            }else{
                $categorias=$this->model->getCategorias();
                $this->view->showCategorias($categorias,"Esta categoria no se puede eliminar");
            }
        }else{
            header('Location:' . BASE_URL . 'categorias');
        }
    }
    function insertCategoria(){
        $this->helper->checkLoggedIn();
        if($_SESSION['ADMINISTRADOR']==1){
            $nombreDeporte = $_REQUEST['nombreDeporte'];
            $descripcion = $_REQUEST['descripcion'];        
            $tipo_competencia = $_REQUEST['tipo_competencia'];

            $this->model->insertCategoria($nombreDeporte,$descripcion,$tipo_competencia);
            header("Location: " . BASE_URL . 'categorias');
        }else{
            header('Location:' . BASE_URL . 'categorias');
        }   
    }
    function getCategoriaById($id){
        $this->helper->checkLoggedIn();
        $categoria= $this->model->getcategoriaById($id);
        $this->view->showUpdateCategoria($categoria);
    }
    function updateCategoria($id){
        if($_SESSION['ADMINISTRADOR']==1){
            $this->helper->checkLoggedIn();
            $this->view->showUpdateCategoria($id);
            $nombreDeporte = $_REQUEST['nombreDeporte'];
            $descripcion = $_REQUEST['descripcion'];        
            $tipo_competencia = $_REQUEST['tipo_competencia'];

            $this->model->updateCategoria($nombreDeporte,$descripcion,$tipo_competencia,$id);
            header("Location: " . BASE_URL . 'categorias');
        }else{
            header('Location:' . BASE_URL . 'categorias');
        }
    }
}
