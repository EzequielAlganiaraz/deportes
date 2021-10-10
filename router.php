<?php
require_once "controller/InvitadoController.php";
require_once "controller/CategoriasController.php";
require_once "controller/JugadoresController.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_TAREAS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/tareas');


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
            $categoriasController->getCategorias();
        }elseif($partesURL[0] == "jugadoresCategoria") {
            $jugadoresController->getJugadoresCategoria($partesURL[1]);
        }


}
}

?>
