<?php

require_once 'libs/Smarty.class.php';

class JugadoresView{

    function __construct(){}

       public function showJugadores($jugadores,$categorias,$pagina = null, $error= null){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Jugadores');
        $smarty->assign('lista_jugadores', $jugadores);
        $smarty->assign('lista_categorias', $categorias);  
        $smarty->assign('pagina', $pagina);
        $smarty->assign('error', $error);;
        $smarty->display('templates/jugadores.tpl');
    }

    public function showUpdateJugador($jugador, $categorias){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Jugadores');
        $smarty->assign('jugador', $jugador);
        $smarty->assign('lista_categorias', $categorias);
        $smarty->display('templates/jugador_actualizar.tpl');
    }

    public function showComments($id){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('id', $id);
        $smarty->display('templates/comments.tpl');
    }


}