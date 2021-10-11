<?php

require_once 'libs/Smarty.class.php';

class UsuarioView{

    function __construct(){}

    public function showLogin(){

        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Login');
        $smarty->display('templates/login.tpl');
    }


}

?>