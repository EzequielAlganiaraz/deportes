<?php 

class JugadoresModel{

    private $db;

    function __construct(){

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_deportes;charset=utf8', 'root', '');
    }


    public function getJugadoresByCategoria($id_categoria){
        $sql = $this->db->prepare("SELECT nombre_apellido,edad,altura,domicilio,dp_jugador.id_categoria, cat.nombre 
                                   FROM dp_jugador 
                                   INNER JOIN dp_categoria AS cat ON (dp_jugador.id_categoria = cat.id_categoria) 
                                   WHERE dp_jugador.id_categoria = ?");
        $sql->execute([$id_categoria]);
        $jugadores = $sql->fetchAll(PDO::FETCH_OBJ);

        return $jugadores;
    }

    public function getJugadores(){
        $sql = $this->db->prepare("SELECT nombre_apellido,edad,altura,domicilio,dp_jugador.id_categoria, cat.nombre 
                                   FROM dp_jugador 
                                   INNER JOIN dp_categoria AS cat ON (dp_jugador.id_categoria = cat.id_categoria)");
        $sql->execute();
        $jugadores = $sql->fetchAll(PDO::FETCH_OBJ);

        return $jugadores;
    }

    public function deleteJugador($id){
        $sql = $this->db->prepare('DELETE FROM dp_jugador WHERE id_deportista=?');
        $sql->execute([$id]);
    }

    public function insertJugador($nombreCompleto, $edad, $altura, $domicilio, $categoria){
        $sql = $this->db->prepare('INSERT INTO dp_jugador(nombre_apellido, edad, altura, domicilio, id_categoria) VALUES (?, ?, ?,?,?)');
        $sql->execute([$nombreCompleto, $edad, $altura, $domicilio, $categoria]);

        return $this->db->lastInsertId();

    }
    public function getJugadorById($id){
        $sql = $this->db->prepare("SELECT * FROM dp_jugador WHERE id_deportista=?");
        $sql->execute([$id]);
        $jugador = $sql->fetch(PDO::FETCH_OBJ);

        return $jugador;
    }

    public function updateJugador($nombreCompleto, $edad, $altura, $domicilio, $categoria, $id){
        $sql = $this->db->prepare('UPDATE dp_jugador SET nombre_apellido = ?,edad = ?, altura = ?, domicilio = ?, id_categoria = ? WHERE id_deportista = ?');
        $sql->execute([$nombreCompleto, $edad, $altura, $domicilio, $categoria, $id]);

    }


}


?>