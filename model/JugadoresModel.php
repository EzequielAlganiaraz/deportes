<?php 

class JugadoresModel{

    private $db;

    function __construct(){

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_deportes;charset=utf8', 'root', '');
    }


    public function getJugadoresByCategoria($id_categoria){
        $sql = $this->db->prepare("SELECT id_deportista, dni, nombre_apellido,edad,altura,domicilio,dp_jugador.id_categoria, dp_categoria.nombre 
                                   FROM dp_jugador 
                                   INNER JOIN dp_categoria ON (dp_jugador.id_categoria = dp_categoria.id_categoria) 
                                   WHERE dp_jugador.id_categoria = ?");
        $sql->execute([$id_categoria]);
        $jugadores = $sql->fetchAll(PDO::FETCH_OBJ);

        return $jugadores;
    }

    public function getJugadores(){
        $sql = $this->db->prepare("SELECT id_deportista, dni, nombre_apellido, edad, altura, domicilio, dp_jugador.id_categoria, dp_categoria.nombre 
                                   FROM dp_jugador 
                                   INNER JOIN dp_categoria ON (dp_jugador.id_categoria = dp_categoria.id_categoria)");
        $sql->execute();
        $jugadores = $sql->fetchAll(PDO::FETCH_OBJ);
        
        return $jugadores;
    }
    public function getAnyJugadores($jugadoresXpagina,$pagina){
        
        $sql = $this->db->prepare("SELECT id_deportista, dni, nombre_apellido, edad, altura, domicilio, dp_jugador.id_categoria, dp_categoria.nombre 
                                   FROM dp_jugador 
                                   INNER JOIN dp_categoria ON (dp_jugador.id_categoria = dp_categoria.id_categoria)
                                   LIMIT :itemInicial , :jugadoresXpagina ");
        $itemInicial=($pagina*$jugadoresXpagina);
        $sql->bindValue(":itemInicial", $itemInicial, PDO::PARAM_INT);
        $sql->bindValue(":jugadoresXpagina", $jugadoresXpagina, PDO::PARAM_INT);      
        $sql->execute();
        

        $jugadores = $sql->fetchAll(PDO::FETCH_OBJ);

        return $jugadores;
    }

    public function deleteJugador($id){
        $sql = $this->db->prepare('DELETE FROM dp_jugador WHERE id_deportista=?');
        $sql->execute([$id]);
    }

    public function insertJugador($nombreCompleto, $dni, $edad, $altura, $domicilio, $categoria){
        try{
            $this->db->beginTransaction();
        
            $consulta= $this->db->prepare('SELECT dni FROM dp_jugador WHERE dni=?');
            $consulta->execute([$dni]);
            $jugadorByDni=$consulta->fetch(PDO::FETCH_COLUMN);
            if($jugadorByDni!=$dni){
                $sql = $this->db->prepare('INSERT INTO dp_jugador(dni, nombre_apellido, edad, altura, domicilio, id_categoria) VALUES (?,?, ?, ?,?,?)');
                $sql->execute([$dni,$nombreCompleto, $edad, $altura, $domicilio, $categoria]);
                $this->db->commit();
                $insert=true;
                
                return $insert;
            }else{
                $insert=false;
            
                return $insert;
            }
        }catch(PDOException  $ex){ 
            $this->db->rollBack(); 
            log($ex->getMessage());
        }

    }
    public function getJugadorById($id){
        $sql = $this->db->prepare("SELECT * FROM dp_jugador WHERE id_deportista=?");
        $sql->execute([$id]);
        $jugador = $sql->fetch(PDO::FETCH_OBJ);

        return $jugador;
    }

    public function updateJugador($nombreCompleto, $dni, $edad, $altura, $domicilio, $categoria, $id){
        $sql = $this->db->prepare('UPDATE dp_jugador SET dni= ?, nombre_apellido = ?,edad = ?, altura = ?, domicilio = ?, id_categoria = ? WHERE id_deportista = ?');
        $sql->execute([$dni,$nombreCompleto, $edad, $altura, $domicilio, $categoria, $id]);

    }
    public function searchJugadorByCategoria($id_categoria){
        $sql= $this->db->prepare('SELECT * FROM dp_jugador WHERE id_categoria=?');
        $sql->execute([$id_categoria]);
        $jugadores=$sql->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
    }
    
    public function searchJugador($string){
        $sql= $this->db->prepare('SELECT id_deportista, dni, nombre_apellido, edad, altura, domicilio, dp_jugador.id_categoria, dp_categoria.nombre 
                                FROM dp_jugador                                  
                                INNER JOIN dp_categoria ON (dp_jugador.id_categoria = dp_categoria.id_categoria)
                                WHERE '.$string.' ');
        $sql->execute();
        $jugadores=$sql->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
    }

}


?>