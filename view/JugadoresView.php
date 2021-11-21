<?php

require_once 'libs/Smarty.class.php';

class JugadoresView{

    function __construct(){}

       public function showJugadores($jugadores,$categorias,$user, $error= null){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Jugadores');
        $smarty->assign('lista_jugadores', $jugadores);
        $smarty->assign('lista_categorias', $categorias);
        $smarty->assign('agregarJugadores', $user->agregarJugadores);
        $smarty->assign('borrarJugadores', $user->borrarJugadores);
        $smarty->assign('actualizarJugadores', $user->actualizarJugadores);
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


}