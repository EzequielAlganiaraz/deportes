<?php

require_once 'libs/Smarty.class.php';

class UsuarioView{

    function __construct(){}

    public function showLogin($error = null){

        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Login');
        $smarty->assign('error',$error);
        $smarty->display('templates/login.tpl');
    }


    public function showHome(){

        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Home');
        $smarty->display('templates/home_usuario.tpl');
    }
    public function showUsuarios($users){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Usuarios');
        $smarty->assign('users', $users);
        $smarty->display('templates/usuarios.tpl');
    }
    public function showPermisosUser($user){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Usuarios');
        $smarty->assign('user', $user);
        $smarty->display('templates/usuario_permisoS.tpl');
    }
}

?>