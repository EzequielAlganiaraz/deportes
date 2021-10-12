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
    public function deleteCategoria($id){
        $sql= $this->db->prepare('DELETE FROM dp_categoria WHERE id_categoria=?');
        $sql->execute([$id]);
    }
    public function insertCategoria($nombreDeporte,$descripcion,$tipo_competencia){
        $sql = $this->db->prepare('INSERT INTO dp_jugador(nombre, descripcion, tipo_competencia) VALUES (?, ?, ?,?,?)');
        $sql->execute([$nombreDeporte,$descripcion,$tipo_competencia]);

        return $this->db->lastInsertId();

    }
    public function updateCategoria($nombreDeporte,$descripcion,$tipo_competencia, $id){
        $sql = $this->db->prepare('UPDATE dp_categoria SET nombre = ?,descripcion = ?, tipo_competencia = ? WHERE id_categoria = ?');
        $sql->execute([$nombreDeporte,$descripcion,$tipo_competencia, $id]);

    }
}


?>