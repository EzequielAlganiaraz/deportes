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


    /*function getJugadoresCategoria($categoria){
        $jugadores = $this->model->getJugadoresByCategoria($categoria);
        $this->view->showJugadores($jugadores, $categoria);
    }*/

    function getJugadores($categorias,$user){
        $this->helper->checkLoggedIn();
        $jugadores = $this->model->getJugadores();    
        $this->view->showJugadores($jugadores,$categorias,$user);
    
    }

    function deleteJugador($id,$user) {
        $this->helper->checkLoggedIn();
        if($user->borrarJugadores==1){
             $this->model->deleteJugador($id);
            header('Location:' . BASE_URL . 'jugadores');
        }else{
            header('Location:' . BASE_URL . 'jugadores');
        }

       
    }

    function insertJugador($categorias,$user){
        $this->helper->checkLoggedIn();
        if($user->agregarJugadores==1){
            $nombreCompleto = $_REQUEST['nombreCompleto'];
            $dni = intVal($_REQUEST['dni']);
            $edad = intVal($_REQUEST['edad']);
            $altura = intVal($_REQUEST['altura']);
            $domicilio = $_REQUEST['domicilio'];
            $categoria = intVal($_REQUEST['categoria']);


            $insert=$this->model->insertJugador($nombreCompleto,$dni , $edad, $altura, $domicilio, $categoria);
            if($insert==true){
                $jugadores=$this->model->getJugadores();
                $this->view->showJugadores($jugadores,$categorias,$user);
            }else{
                $jugadores=$this->model->getJugadores();
                $this->view->showJugadores($jugadores,$categorias,$user, "El jugador que desea ingresar ya se encuentra federado");
            }
        }else{
            header('Location:' . BASE_URL . 'jugadores');
        }
        
    }

    function getJugadorById($id, $categorias,$user){
        $this->helper->checkLoggedIn();
        $jugador = $this->model->getJugadorById($id);
        if($user->actualizarJugadores==1){
            $this->view->showUpdateJugador($jugador, $categorias);
        }else{
            header('Location:' . BASE_URL . 'jugadores');
        }

    }

    function updateJugador($id,$user){
        $this->helper->checkLoggedIn();
        if($user->actualizarJugadores==1){
            $nombreCompleto = $_REQUEST['nombreCompleto'];
            $dni= $_REQUEST['dni'];
            $edad = intVal($_REQUEST['edad']);
            $altura = intVal($_REQUEST['altura']);
            $domicilio = $_REQUEST['domicilio'];
            $categoria = intVal($_REQUEST['categoria']);

            $this->model->updateJugador($nombreCompleto, $dni,$edad, $altura, $domicilio, $categoria, $id);
            header("Location: " . BASE_URL . 'jugadores');
        }
    }
    function searchJugadores($id_categoria){
        $this->helper->checkLoggedIn();
        $jugador=$this->model->searchJugador($id_categoria);
        return $jugador;
    }

}

?>