<?php 
require_once "./view/JugadoresView.php";
require_once "./model/JugadoresModel.php";

class JugadoresController {

    private $view;
    private $model;

    function __construct(){
        $this->view = new JugadoresView();
        $this->model = new JugadoresModel();
    }


    function getJugadoresCategoria($categoria){
        $jugadores = $this->model->getJugadoresByCategoria($categoria);
        $this->view->showJugadoresCategoria($jugadores);
    }

}

?>