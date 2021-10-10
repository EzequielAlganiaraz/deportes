<?php

require_once 'libs/Smarty.class.php';

class InvitadoView{

    function __construct(){}

    public function displayHome(){

        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->display('templates/home_invitado.tpl');
    }


}