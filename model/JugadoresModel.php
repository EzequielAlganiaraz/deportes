<?php 

class JugadoresModel{

    private $db;

    function __construct(){

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_deportes;charset=utf8', 'root', '');
    }


    public function getJugadoresByCategoria($id_categoria){
        $sql = $this->db->prepare("SELECT * FROM dp_jugador WHERE id_categoria = ?");
        $sql->execute([$id_categoria]);
        $jugadores = $sql->fetchAll(PDO::FETCH_OBJ);

        return $jugadores;
    }

}


?>