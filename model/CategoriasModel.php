<?php 

class CategoriasModel{

    private $db;

    function __construct(){

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_deportes;charset=utf8', 'root', '');
    }


    public function getCategorias(){
        $sql = $this->db->prepare("SELECT * FROM dp_categoria");
        $sql->execute();
        $categorias = $sql->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

}


?>