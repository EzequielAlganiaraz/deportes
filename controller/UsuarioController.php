<?php 
require_once "./view/UsuarioView.php";
require_once "./model/UsuarioModel.php";
require_once "./helpers/UsuarioHelper.php";



class UsuarioController {

    private $view;
    private $model;
    private $usuarioHelper;

    function __construct(){
        $this->view = new UsuarioView();
        $this->model = new UsuarioModel();
        $this->usuarioHelper = new UsuarioHelper();
    }


    function showLogin(){
        $this->view->showLogin();
    }

    function doLogin(){
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $user = $this->model->getUser($username);
            $hashPswd = md5($password);
            if ($user && ($hashPswd == $user->password)) {
                 
                $this->usuarioHelper->login($user);
                $this->view->showHome();
            } else {
                $this->view->showLogin();
                
            }
        }
    }

    function logout() {
        $this->usuarioHelper->logout();
        $this->view->showHome();
    }

}

?>