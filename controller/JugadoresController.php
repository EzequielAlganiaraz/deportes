<?php 
require_once "./view/JugadoresView.php";
require_once "./model/JugadoresModel.php";
require_once "./helpers/usuarioHelper.php";

class JugadoresController {

    private $view;
    private $model;
    private $helper;

    function __construct(){
        $this->view = new JugadoresView();
        $this->model = new JugadoresModel();
        $this->helper = new UsuarioHelper();
    }


    function getJugadoresCategoria($categoria){
        $jugadores = $this->model->getJugadoresByCategoria($categoria);
        $this->view->showJugadores($jugadores);
    }
    function getAllJugadores(){
        $AllJugadores = $this->model->getJugadores();
        $this->view->showJugadores($AllJugadores);
    }
    function getJugadoresAbm($categorias){
        $this->helper->checkLoggedIn();
        $jugadores = $this->model->getJugadores();
        $this->view->showJugadoresAbm($jugadores,$categorias);
    }

    function deleteJugador($id) {
        $this->helper->checkLoggedIn();
        $this->model->deleteJugador($id);
        header('Location:' . BASE_URL . 'jugadoresAbm');
    }

    function insertJugador(){
        $this->helper->checkLoggedIn();
        $nombreCompleto = $_REQUEST['nombreCompleto'];
        $edad = intVal($_REQUEST['edad']);
        $altura = intVal($_REQUEST['altura']);
        $domicilio = $_REQUEST['domicilio'];
        $categoria = intVal($_REQUEST['categoria']);

        $this->model->insertJugador($nombreCompleto, $edad, $altura, $domicilio, $categoria);
        header("Location: " . BASE_URL . 'jugadoresAbm');
    }

    function getJugadorById($id, $categorias){
        $this->helper->checkLoggedIn();
        $jugador = $this->model->getJugadorById($id);
        $this->view->showUpdateJugador($jugador, $categorias);
    }

    function updateJugador($id){
        $this->helper->checkLoggedIn();
        $nombreCompleto = $_REQUEST['nombreCompleto'];
        $edad = intVal($_REQUEST['edad']);
        $altura = intVal($_REQUEST['altura']);
        $domicilio = $_REQUEST['domicilio'];
        $categoria = intVal($_REQUEST['categoria']);

        $this->model->updateJugador($nombreCompleto, $edad, $altura, $domicilio, $categoria, $id);
        header("Location: " . BASE_URL . 'jugadoresAbm');
    }
    function searchJugadores($id_categoria){
        $this->helper->checkLoggedIn();
        $jugador=$this->model->searchJugador($id_categoria);
        return $jugador;
    }

}

?>