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


}