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


    public function showHome(){

        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Home');
        $smarty->display('templates/home_usuario.tpl');
    }

}

?>