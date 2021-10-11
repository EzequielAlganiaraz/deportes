<?php 
require_once "./view/UsuarioView.php";


class UsuarioController {

    private $view;


    function __construct(){
        $this->view = new UsuarioView();
        
    }


    function showLogin(){
        $this->view->showLogin();
    }

}

?>