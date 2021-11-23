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
        if($_SESSION){
            $this->view->showHome();
        }else{
            $this->view->showLogin();
        }
        
    }

    function showRegistro(){
        $this->view->showRegistro();
    }

    function doLogin(){
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            
            $user = $this->model->getUser($username);
            if ($user && password_verify($password, ($user->password))) {
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

    function doRegister(){
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            
            
            $id = $this->model->saveUser($username, $password);

            $user = $this->model->getUserbyID($id);
            
            if ($user) {
                $this->usuarioHelper->login($user);
                $this->view->showHome();
            } else {
                $this->view->showregistro("Error en el registro");
            }
        }
        else{
            $this->view->showRegistro("Error en registro: Verifique que haya completado todos los campos");
        }
    }



    function showHome(){
        $this->usuarioHelper->checkLoggedIn();
        $this->view->showHome();
    }
    function showUsuarios(){
        $this->usuarioHelper->checkLoggedIn();
        if($_SESSION['ROLE']=='administrador'){           
            $users=$this->model->getAll();
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
        if($_SESSION['ROLE']=='administrador'){
            $this->model->deleteUsuario($id);
            header('Location:' . BASE_URL . 'showUsuarios');
        }else{
            header('Location:' . BASE_URL . 'home');
        }        
    }
    function showPermisos($id){
        $this->usuarioHelper->checkLoggedIn();
        if($_SESSION['ROLE']=='administrador'){
            $user=$this->model->getUserbyID($id);
            $this->view->showPermisosUser($user);
        }else{
            header('Location:' . BASE_URL . 'home');
        }
    }
    function actualizarPermisos($id){        
        $this->usuarioHelper->checkLoggedIn();
        if($_SESSION['ROLE']=='administrador'){
            $permiso= $_REQUEST['permisos'];
            $this->model->updateUsuario($permiso, $id);
            header('Location:' . BASE_URL . 'showUsuarios');
        }else{
            header('Location:' . BASE_URL . 'home');
        }
    }
    function logout() {        
        $this->usuarioHelper->logout();
    }

}

?>