<?php

require_once 'libs/Smarty.class.php';

class JugadoresView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();}

    public function showJugadores($jugadores){
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('titulo','Jugadores');
        $this->smarty->assign('lista_jugadores', $jugadores);
        $this->smarty->display('templates/jugadores.tpl');
    }
    public function showAllJugadores($AllJugadores){
        
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('titulo','Jugadores');
        $this->smarty->assign('lista_jugadores', $AllJugadores);
        $this->smarty->display('templates/jugadores.tpl');
    }
    public function showJugadoresAbm($jugadores,$categorias){
        
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('titulo','Jugadores');
        $this->smarty->assign('lista_jugadores', $jugadores);
        $this->smarty->assign('lista_categorias', $categorias);
        $this->smarty->display('templates/jugadores_abm.tpl');
    }

    public function showUpdateJugador($jugador, $categorias){
        
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('titulo','Jugadores');
        $this->smarty->assign('jugador', $jugador);
        $this->smarty->assign('lista_categorias', $categorias);
        $this->smarty->display('templates/jugador_actualizar.tpl');
    }


}