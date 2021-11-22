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

    function getJugadores($categorias){
        $this->helper->checkLoggedIn();
        $jugadores = $this->model->getJugadores();    
        $this->view->showJugadores($jugadores,$categorias);
    
    }

    function deleteJugador($id) {
        $this->helper->checkLoggedIn();
        if($_SESSION['ADMINISTRADOR']==1){
             $this->model->deleteJugador($id);
            header('Location:' . BASE_URL . 'jugadores');
        }else{
            header('Location:' . BASE_URL . 'jugadores');
        }

       
    }

    function insertJugador($categorias){
        $this->helper->checkLoggedIn();
        if($_SESSION['ADMINISTRADOR']==1){
            $nombreCompleto = $_REQUEST['nombreCompleto'];
            $dni = intVal($_REQUEST['dni']);
            $edad = intVal($_REQUEST['edad']);
            $altura = intVal($_REQUEST['altura']);
            $domicilio = $_REQUEST['domicilio'];
            $categoria = intVal($_REQUEST['categoria']);


            $insert=$this->model->insertJugador($nombreCompleto,$dni , $edad, $altura, $domicilio, $categoria);
            if($insert==true){
                $jugadores=$this->model->getJugadores();
                $this->view->showJugadores($jugadores, $categorias);
            }else{
                $jugadores=$this->model->getJugadores();
                $this->view->showJugadores($jugadores,$categorias, "El jugador que desea ingresar ya se encuentra federado");
            }
        }else{
            header('Location:' . BASE_URL . 'jugadores');
        }
        
    }

    function getJugadorById($id, $categorias){
        $this->helper->checkLoggedIn();        
        if($_SESSION['ADMINISTRADOR']==1){
            $jugador = $this->model->getJugadorById($id);
            $this->view->showUpdateJugador($jugador, $categorias);
        }else{
            header('Location:' . BASE_URL . 'jugadores');
        }

    }

    function updateJugador($id){
        $this->helper->checkLoggedIn();
        if($_SESSION['ADMINISTRADOR']==1){
            $nombreCompleto = $_REQUEST['nombreCompleto'];
            $dni= $_REQUEST['dni'];
            $edad = intVal($_REQUEST['edad']);
            $altura = intVal($_REQUEST['altura']);
            $domicilio = $_REQUEST['domicilio'];
            $categoria = intVal($_REQUEST['categoria']);

            $this->model->updateJugador($nombreCompleto, $dni,$edad, $altura, $domicilio, $categoria, $id);
            header("Location: " . BASE_URL . 'jugadores');
        }else{
            header('Location:' . BASE_URL . 'jugadores');
        }
    }
    function searchJugadoresByCategoria($id_categoria){
        $this->helper->checkLoggedIn();
        $jugador=$this->model->searchJugadorByCategoria($id_categoria);
        return $jugador;
    }
    function searchJugadores(){
        $this->helper->checkLoggedIn();
        $atributos = $_REQUEST['atributos'];
        $search= $_REQUEST['search'];
        
        if ($atributos="nombre_apellido"){

        }
        if ($atributos="edad"){

        }
        if ($atributos="altura"){

        }
        if ($atributos="deporte"){
            $jugadores= $this->model->searchJugadorByCategoria($search);
            $this->view->showJugadores($jugadores,$search,$user);
        }
        if ($atributos="dni"){

        }
        if ($atributos="domicilio"){

        }

        $this->model->searchJugador($atributos, $search);
        header("Location: " . BASE_URL . 'jugadores');
        
    }

}

?>