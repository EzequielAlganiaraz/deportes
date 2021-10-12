<?php

require_once 'libs/Smarty.class.php';

class JugadoresView{

    function __construct(){}

    public function showJugadoresCategoria($jugadores_categoria){

        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Jugadores');
        $smarty->assign('lista_jugadores_categoria', $jugadores_categoria);
        $smarty->display('templates/jugadores_categoria.tpl');
    }
    public function showAllJugadores($AllJugadores){

        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Jugadores');
        $smarty->assign('lista_jugadores', $AllJugadores);
        $smarty->display('templates/jugadores.tpl');
    }
    public function showJugadoresAbm($jugadores,$categorias){
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo','Jugadores');
        $smarty->assign('lista_jugadores', $jugadores);
        $smarty->assign('lista_categorias', $categorias);
        $smarty->display('templates/jugadores_abm.tpl');
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