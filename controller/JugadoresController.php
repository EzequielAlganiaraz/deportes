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


    function getJugadores($categorias,$pagina){
        $this->helper->checkLoggedIn();
        $cantidad_jugadores= count($this->model->getJugadores());         
        $jugadoresXpagina=4;
        $cantidad_paginas= ceil($cantidad_jugadores/$jugadoresXpagina);
        if($pagina>$cantidad_paginas || $pagina<=0){
            $pagina=1;
            $jugadores_pagina = $this->model->getAnyJugadores($jugadoresXpagina,($pagina-1)); 
            $this->view->showJugadores($jugadores_pagina,$categorias,$pagina);
        }  else{
            $jugadores_pagina = $this->model->getAnyJugadores($jugadoresXpagina,($pagina-1)); 
            $this->view->showJugadores($jugadores_pagina,$categorias,$pagina);
           
        }      
       
        
    
    }

    function deleteJugador($id) {
        $this->helper->checkLoggedIn();
        if($_SESSION['ROLE']=='administrador'){
             $this->model->deleteJugador($id);
            header('Location:' . BASE_URL . 'jugadores/1');
        }else{
            header('Location:' . BASE_URL . 'jugadores/1');
        }

       
    }

    function insertJugador($categorias){
        $this->helper->checkLoggedIn();
        if($_SESSION['ROLE']=='administrador'){
            $nombreCompleto = $_REQUEST['nombreCompleto'];
            $dni = intVal($_REQUEST['dni']);
            $edad = intVal($_REQUEST['edad']);
            $altura = intVal($_REQUEST['altura']);
            $domicilio = $_REQUEST['domicilio'];
            $categoria = intVal($_REQUEST['categoria']);
            $imagen=($_FILES['img_jugador']['tmp_name']);
           
            if($_FILES['img_jugador']['type']== "image/jpg" ||  $_FILES['img_jugador']['type'] == "image/jpeg" ||  $_FILES['img_jugador']['type'] == "image/png" ){
                
                $insert=$this->model->insertJugador($nombreCompleto,$dni , $edad, $altura, $domicilio, $categoria ,$imagen);
                 
            } else{
                $insert=$this->model->insertJugador($nombreCompleto,$dni , $edad, $altura, $domicilio, $categoria);
            }
            
            if($insert==true){
                $jugadores=$this->model->getJugadores();
                header('Location:' . BASE_URL . 'jugadores/1');
            }else{
                $jugadores=$this->model->getJugadores();
                $this->view->showJugadores($jugadores,$categorias, "El jugador que desea ingresar ya se encuentra federado");
            }
        }else{
            header('Location:' . BASE_URL . 'jugadores/1');
        }
        
    }

    function getJugadorById($id, $categorias){
        $this->helper->checkLoggedIn();        
        if($_SESSION['ROLE']=='administrador'){
            $jugador = $this->model->getJugadorById($id);
            $this->view->showUpdateJugador($jugador, $categorias);
            
        }else{
            header('Location:' . BASE_URL . 'jugadores/1');
        }

    }

    function updateJugador($id){
        $this->helper->checkLoggedIn();

        if($_SESSION['ROLE']=='administrador'){
            $nombreCompleto = $_REQUEST['nombreCompleto'];
            $dni= $_REQUEST['dni'];
            $edad = intVal($_REQUEST['edad']);
            $altura = intVal($_REQUEST['altura']);
            $domicilio = $_REQUEST['domicilio'];
            $categoria = intVal($_REQUEST['categoria']);
            $imagen=($_FILES['img_jugador']['tmp_name']);

            if($_FILES['img_jugador']['type']== "image/jpg" ||  $_FILES['img_jugador']['type'] == "image/jpeg" ||  $_FILES['img_jugador']['type'] == "image/png" ){
                $this->model->updateJugador($nombreCompleto,$dni , $edad, $altura, $domicilio, $id, $categoria ,$imagen);
                header('Location:' . BASE_URL . 'jugadores/1');
            } else{
                $this->model->updateJugador($nombreCompleto,$dni , $edad, $altura, $domicilio, $id, $categoria );
                header('Location:' . BASE_URL . 'jugadores/1');             
            }
            
        } else{
            var_dump("ESTA ACA");
        }
    }
    function searchJugadoresByCategoria($id_categoria){
        $this->helper->checkLoggedIn();
        $jugador=$this->model->searchJugadorByCategoria($id_categoria);
        return $jugador;
    }
    function searchJugadores($categorias){
        $this->helper->checkLoggedIn();
        $busqueda= "";
        
        if(!empty($_REQUEST['nombreCompleto'])){
            $nombreCompleto=$_REQUEST['nombreCompleto'];           
            $busqueda=" nombre_apellido= '".$nombreCompleto. " '";
        } 
        if(!empty($_REQUEST['dni'])){
            $dni= intVal($_REQUEST['dni']);
            if(empty($busqueda)){
                $busqueda= "dni= '".$dni."' ";
            }else{
                $busqueda=$busqueda."AND  dni= '".$dni."' ";
            }
            
        }
        if(!empty($_REQUEST['edad'])){
            $edad=intVal($_REQUEST['edad']);
            if(empty($busqueda)){
                $busqueda= " edad=" .$edad. "  ";
            }else{
                $busqueda=$busqueda ." AND edad= " .$edad. "  "; 
            }
        }
        if(!empty($_REQUEST['altura'])){
            $altura=intVal($_REQUEST['altura']);
            if(empty($busqueda)){
                $busqueda="  altura= ".$altura." "; 
            }else{
                $busqueda=$busqueda . " AND  altura= ".$altura." "; 
            }
        }
        if(!empty($_REQUEST['domicilio'])){
            $domicilio=$_REQUEST['domicilio'];
            if(empty($busqueda)){
                $busqueda= "  domicilio= '".$domicilio."'  ";
            }else{
                $busqueda= $busqueda ." AND domicilio= '".$domicilio."'  ";
            }
        }
        if(!empty($_REQUEST['categorias'])){
            $categoria=$_REQUEST['categorias'];
            if(empty($busqueda)){
                $busqueda= "nombre= '" .$categoria."' ";
            }else{
                $busqueda=$busqueda ." AND nombre= '" .$categoria."' ";  
            }
        }
        if(empty($busqueda)){
            header('Location:' . BASE_URL . 'jugadores/1');
        }else{
            $jugadores=$this->model->searchJugador($busqueda);
            if(!empty($jugadores)){
                $this->view->showJugadores($jugadores, $categorias);
            }else{
                $this->view->showJugadores($jugadores, $categorias,"No hay resultados que coincidan con la búsqueda");
            }
        }            
        
    }
}
