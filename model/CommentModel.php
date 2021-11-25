<?php 
class ComentModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_deportes;charset=utf8', 'root', '');
    }

    function getCommentsByJugador($idJugador) {
        $sql = $this->db->prepare("SELECT * FROM dp_comentarios WHERE id_jugador=?");
        $sql->execute([$idJugador]);
        $comentarios = $sql->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }

    function deleteComment($id){
        $sql = $this->db->prepare('DELETE FROM dp_comentarios WHERE id_comentario=?');
        $sql->execute([$id]);
    }

    function getCommentById($id){
        $sql = $this->db->prepare("SELECT * FROM dp_comentarios WHERE id_comentario=?");
        $sql->execute([$id]);
        $comentario = $sql->fetch(PDO::FETCH_OBJ);

        return $comentario;
    }

    function insertComment($descripcion, $puntaje, $idJugador){
        $sql= $this->db->prepare('INSERT INTO dp_comentarios (descripcion, puntaje, id_Jugador) VALUES (?,?,?)');
        $sql->execute([$descripcion, $puntaje, $idJugador]);

        return $this->db->lastInsertId();
    }
    
}



?>