<?php

require_once './view/invitadoView.php';


class InvitadoController {

    private $view;

    function __construct(){

        $this->view = new InvitadoView();
    }


    public function showHomeInvitado(){

        $this->view->displayHome();
    }
}


?>