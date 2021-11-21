<?php 

class UsuarioModel{

    private $db;

    function __construct(){

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_deportes;charset=utf8', 'root', '');
    }


    public function getUser($username){
        $sql = $this->db->prepare("SELECT * FROM dp_usuario WHERE username = ?");
        $sql->execute([$username]);
        $user= $sql->fetch(PDO::FETCH_OBJ);

        return $user;
    }
    public function getAll(){
        $sql = $this->db->prepare("SELECT * FROM dp_usuario");
        $sql->execute();
        $users= $sql->fetch(PDO::FETCH_OBJ);

        return $users;
    }
    
    public function getUserbyID($id){
        $sql = $this->db->prepare("SELECT * FROM dp_usuario WHERE id_usuario = ?");
        $sql->execute([$id]);
        $user= $sql->fetch(PDO::FETCH_OBJ);

        return $user;
    }
    public function deleteUsuario($id){
        $sql = $this->db->prepare("DELETE FROM dp_usuario WHERE id_usuario=?");
        $sql->execute([$id]);    
    }

}


?>