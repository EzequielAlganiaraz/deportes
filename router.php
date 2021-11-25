<?php
require_once "controller/CategoriasController.php";
require_once "controller/JugadoresController.php";
require_once "controller/UsuarioController.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define ("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');

$action = $_GET["action"];

$categoriasController = new CategoriasController();
$jugadoresController = new JugadoresController();

$params = explode('/',$action);

if($action == ''){
        $UsuarioController = new UsuarioController();
        $UsuarioController->showLogin();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);        
        if($partesURL[0] == "login") {
            $UsuarioController = new UsuarioController();
            $UsuarioController->showLogin();
        }elseif($partesURL[0] == "iniciarSesion") {
            $UsuarioController = new UsuarioController();
            $UsuarioController->doLogin();
        }elseif ($partesURL[0] == "showRegistro"){
            $UsuarioController = new UsuarioController();
            $UsuarioController->showRegistro();
        }
        elseif ($partesURL[0] == "registrarse"){
            $UsuarioController = new UsuarioController();
            $UsuarioController->doRegister();
        } 
        else if($partesURL[0] == "home"){
            $UsuarioController = new UsuarioController();
            $UsuarioController->showHome();
        }
        elseif($partesURL[0] == "jugadores") {
            $categorias = $categoriasController->getCategorias();
            $jugadoresController->getJugadores($categorias);
            
        }elseif($partesURL[0] == "borrarJugador") {                  
            
            $jugadoresController->deleteJugador($partesURL[1]);
        }elseif($partesURL[0] == "agregarJugador") {
            $categorias= $categoriasController->getCategorias();
            $jugadoresController->insertJugador($categorias);
        }elseif($partesURL[0] == "actualizarJugador") {            
            $categorias = $categoriasController->getCategorias();
            $jugadoresController->getJugadorById($partesURL[1],$categorias);
        }elseif($partesURL[0] == "updateJugador") {
            
            $jugadoresController->updateJugador($partesURL[1]);
        }
        elseif($partesURL[0] == "categorias") {
           $categoriasController->showCategorias();
        }elseif($partesURL[0] == "borrarCategoria") {
            $jugadores= $jugadoresController->searchJugadoresByCategoria($partesURL[1]);
            $categoriasController->deleteCategoria($partesURL[1], $jugadores);
        }elseif($partesURL[0] == "agregarCategoria") {
            $categoriasController->insertCategoria();
        }elseif($partesURL[0] == "actualizarCategoria") {
            $categoriasController->getCategoriaById($partesURL[1],);
        }elseif($partesURL[0] == "updateCategoria") {
            $categoriasController->updateCategoria($partesURL[1]);
        }elseif($partesURL[0] == "filtrarJugadores"){
            $UsuarioController = new UsuarioController();            
            $user= $UsuarioController->getUser();
            $jugadoresController->searchJugadores();
        }
        elseif($partesURL[0] == "showUsuarios"){ 
            $UsuarioController = new UsuarioController();
            $UsuarioController->showUsuarios();
        }elseif($partesURL[0] == "borrarUsuario") {
            $UsuarioController = new UsuarioController();
            $UsuarioController->deleteUsuario($partesURL[1]);
        }elseif($partesURL[0] == "permisos"){
            $UsuarioController = new UsuarioController();            
            $UsuarioController->showPermisos($partesURL[1]);
        }elseif($partesURL[0] == "actualizarPermisos"){
            $UsuarioController = new UsuarioController();            
            $UsuarioController->actualizarPermisos($partesURL[1]);
        }
        elseif($partesURL[0] == "logout") {
            $UsuarioController = new UsuarioController();
            $UsuarioController->logout();
        }
        elseif($partesURL[0] == "seeComments"){
            $jugadoresController->showComments($partesURL[1]);
        }


}
}

?>
