<?php
require_once "controller/InvitadoController.php";
require_once "controller/CategoriasController.php";
require_once "controller/JugadoresController.php";
require_once "controller/UsuarioController.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');


$action = $_GET["action"];

$invitadoController = new InvitadoController();
$categoriasController = new CategoriasController();
$jugadoresController = new JugadoresController();

$params = explode('/',$action);

if($action == ''){
    $invitadoController->showHomeInvitado();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "categorias"){
            $categoriasController->showCategorias();
        }elseif($partesURL[0] == "jugadoresCategoria") {
            $jugadoresController->getJugadoresCategoria($partesURL[1]);
        }elseif($partesURL[0] == "jugadores") {
            $jugadoresController->getAllJugadores();
        }elseif($partesURL[0] == "login") {
            $UsuarioController = new UsuarioController();
            $UsuarioController->showLogin();
        }elseif($partesURL[0] == "iniciarSesion") {
            $UsuarioController = new UsuarioController();
            $UsuarioController->doLogin();
        } else if($partesURL[0] == "homeUsuario"){
            $UsuarioController = new UsuarioController();
            $UsuarioController->showHome();
        }elseif($partesURL[0] == "jugadoresAbm") {

            $categorias = $categoriasController->getCategorias();
            $jugadoresController->getJugadoresAbm($categorias);
        }elseif($partesURL[0] == "borrarJugador") {
            $jugadoresController->deleteJugador($partesURL[1]);
        }elseif($partesURL[0] == "agregarJugador") {
            $jugadoresController->insertJugador();
        }elseif($partesURL[0] == "actualizarJugador") {
            $categorias = $categoriasController->getCategorias();
            $jugadoresController->getJugadorById($partesURL[1],$categorias);
        }elseif($partesURL[0] == "updateJugador") {
            $jugadoresController->updateJugador($partesURL[1]);
        }elseif($partesURL[0] == "categoriasAbm") {
           $categoriasController->getCategoriaAbm();
        }elseif($partesURL[0] == "borrarCategoria") {
            $jugadores= $jugadoresController->searchJugadores($partesURL[1]);
            $categoriasController->deleteCategoria($partesURL[1], $jugadores);
        }elseif($partesURL[0] == "agregarCategoria") {
            $categoriasController->insertCategoria();
        }elseif($partesURL[0] == "actualizarCategoria") {
            $categoriasController->getCategoriaById($partesURL[1],);
        }elseif($partesURL[0] == "updateCategoria") {
            $categoriasController->updateCategoria($partesURL[1]);
        }        
        elseif($partesURL[0] == "logout") {
            $UsuarioController = new UsuarioController();
            $UsuarioController->logout();
        }


}
}

?>
