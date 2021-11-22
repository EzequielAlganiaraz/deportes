<?php 
require_once "./view/UsuarioView.php";
require_once "./model/UsuarioModel.php";
require_once "./helpers/usuarioHelper.php";



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
                $this->view->showLogin("Error en login: Verifique que el usuario y la contraseña sean correctos");
                
            }
        }
        else{
            $this->view->showLogin("Error en login: Verifique que haya completado todos los campos");
        }
    }
    function showHome(){
        $this->usuarioHelper->checkLoggedIn();
        $this->view->showHome();
    }
    function showUsuarios(){
        $this->usuarioHelper->checkLoggedIn();
        $rol=$_SESSION['ROLE'];
        if($rol=="administrador"){           
            $users=$this->model->getAllbyRole("usuario");
            $this->view->showUsuarios($users);
        }else{
            header('Location:' . BASE_URL . 'home');
        }
    }
    function getUser(){
        $this->usuarioHelper->checkLoggedIn();
        $user= $this->model->getUserbyID($_SESSION['ID']);
        return $user;
    }
    function deleteUsuario($id){
        $this->usuarioHelper->checkLoggedIn();
        if($_SESSION['ROLE']="administrador"){
            $this->model->deleteUsuario($id);
            header('Location:' . BASE_URL . 'showUsuarios');
        }        
    }
    function actualizarPermisos($id){        
        $this->usuarioHelper->checkLoggedIn();
        $agregarJugadores= $_REQUEST['AgregarJugadores'];
        $borrarJugadores= $_REQUEST['BorrarJugadores'];
        $actualizarJugadores = $_REQUEST['ActualizarJugadores'];
        $comentarJugadores = $_REQUEST['ComentarJugadores'];
       

        $this->model->updateUsuario( $id, $agregarJugadores,$borrarJugadores,$actualizarJugadores,$comentarJugadores);
        header("Location: " . BASE_URL . 'showUsuarios');
    }
    function logout() {        
        $this->usuarioHelper->logout();
    }

}

?>