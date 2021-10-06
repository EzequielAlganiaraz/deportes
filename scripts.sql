CREATE TABLE `db_deportes`.`dp_jugador` ( `id_deportista` INT NOT NULL AUTO_INCREMENT , `nombre_apellido` VARCHAR(60) NOT NULL , `edad` INT(2) NOT NULL , `altura` INT(3) NOT NULL , `domicilio` VARCHAR(50) NOT NULL , `id_categoria` INT NOT NULL , PRIMARY KEY (`id_deportista`)) ENGINE = InnoDB;
CREATE TABLE `db_deportes`.`dp_categoria` ( `id_categoria` INT NOT NULL AUTO_INCREMENT , `descripcion` VARCHAR(300) NOT NULL , `tipo_competencia` VARCHAR NOT NULL , PRIMARY KEY (`id_categoria`)) ENGINE = InnoDB;
CREATE TABLE `db_usuario` ( `id_usuario` INT NOT NULL AUTO_INCREMENT ,`username` VARCHAR(60) NOT NULL, `password` VARCHAR(20) NOT NULL)