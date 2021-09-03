/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.20-MariaDB : Database - bdhotsports2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdhotsports2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bdhotsports2`;

/*Table structure for table `bitacora_productos` */

DROP TABLE IF EXISTS `bitacora_productos`;

CREATE TABLE `bitacora_productos` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `datos_viejos` varchar(500) DEFAULT NULL,
  `datos_nuevos` varchar(500) DEFAULT NULL,
  `operacion` varchar(100) DEFAULT NULL,
  `tabla` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `bitacora_productos` */

LOCK TABLES `bitacora_productos` WRITE;

insert  into `bitacora_productos`(`id_bitacora`,`usuario`,`fecha`,`datos_viejos`,`datos_nuevos`,`operacion`,`tabla`) values (1,'root@localhost','2019-07-26',NULL,' Fotografia:20190327_182503.jpgNombrePro:tenisDescripcion:Tenis Deportivos Nuevos para futbol rapidoaaaaaaaaaid_Categoria:Infantiles id_Marca:AdidasaaaaaTalla:24cantidad:4 Precio:1200','Insertar','tblproductos');

UNLOCK TABLES;

/*Table structure for table `tblbitacora` */

DROP TABLE IF EXISTS `tblbitacora`;

CREATE TABLE `tblbitacora` (
  `idBT` int(11) NOT NULL AUTO_INCREMENT,
  `operacion` varchar(10) DEFAULT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `tabla` varchar(40) NOT NULL,
  `datos_nuevos` varchar(200) NOT NULL,
  `datos_viejos` varchar(200) NOT NULL,
  PRIMARY KEY (`idBT`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tblbitacora` */

LOCK TABLES `tblbitacora` WRITE;

insert  into `tblbitacora`(`idBT`,`operacion`,`usuario`,`fecha`,`tabla`,`datos_nuevos`,`datos_viejos`) values (1,'Actualizar','root@localhost','2021-09-03 00:58:07','tblcliente','Nombre:jnj A_Paterno:Hernandez A_Materno:HernandezTelefono:8891238797Estado:TamaulipasCiudad:aaaaCalle:nuevoColonia:aaaaEmail:angel@asdad.com','Nombre:Marcos A_Paterno:Hernandez A_Materno:HernandezTelefono:8891238797Estado:TamaulipasCiudad:aaaaCalle:nuevoColonia:aaaaEmail:angel@asdad.com'),(2,'Actualizar','root@localhost','2021-09-03 01:11:27','tblcliente','Nombre:Marcos A_Paterno:Hernandez A_Materno:HernandezTelefono:8891238797Estado:TamaulipasCiudad:aaaaCalle:nuevoColonia:aaaaEmail:angel@asdad.com','Nombre:jnj A_Paterno:Hernandez A_Materno:HernandezTelefono:8891238797Estado:TamaulipasCiudad:aaaaCalle:nuevoColonia:aaaaEmail:angel@asdad.com');

UNLOCK TABLES;

/*Table structure for table `tblcliente` */

DROP TABLE IF EXISTS `tblcliente`;

CREATE TABLE `tblcliente` (
  `intIdcliente` int(11) NOT NULL AUTO_INCREMENT,
  `vchNombre` varchar(80) DEFAULT NULL,
  `vchApaterno` varchar(80) DEFAULT NULL,
  `vchAmaterno` varchar(80) DEFAULT NULL,
  `vchCelular` varchar(10) DEFAULT NULL,
  `vchEstado` varchar(20) DEFAULT NULL,
  `vchCiudad` varchar(20) DEFAULT NULL,
  `vchCalle` varchar(30) DEFAULT NULL,
  `vchColonia` varchar(20) DEFAULT NULL,
  `vchEmail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`intIdcliente`),
  KEY `idcliente` (`vchNombre`,`vchApaterno`,`vchAmaterno`,`vchEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tblcliente` */

LOCK TABLES `tblcliente` WRITE;

insert  into `tblcliente`(`intIdcliente`,`vchNombre`,`vchApaterno`,`vchAmaterno`,`vchCelular`,`vchEstado`,`vchCiudad`,`vchCalle`,`vchColonia`,`vchEmail`) values (13,'Angel Alberto','De La Cruz ','Garcia','7716838276','Hidalgo','Huejutla De Reyes','20 de abril1','Del Carmen','angel_barsa99@hotmail.com'),(14,'Marcos','Hernandez','Hernandez','8891238797','Tamaulipas','aaaa','nuevo','aaaa','angel@asdad.com');

UNLOCK TABLES;

/*Table structure for table `tblmet_pago` */

DROP TABLE IF EXISTS `tblmet_pago`;

CREATE TABLE `tblmet_pago` (
  `intIdmet_pago` int(11) NOT NULL AUTO_INCREMENT,
  `vchDescripcion` varchar(10) NOT NULL,
  PRIMARY KEY (`intIdmet_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tblmet_pago` */

LOCK TABLES `tblmet_pago` WRITE;

insert  into `tblmet_pago`(`intIdmet_pago`,`vchDescripcion`) values (1,'Deposito');

UNLOCK TABLES;

/*Table structure for table `tblproductos` */

DROP TABLE IF EXISTS `tblproductos`;

CREATE TABLE `tblproductos` (
  `intIdproducto` int(11) NOT NULL AUTO_INCREMENT,
  `pro_img` text DEFAULT NULL,
  `vchNombre` varchar(10) DEFAULT NULL,
  `vchDescripcion` varchar(100) DEFAULT NULL,
  `vchTipop` varchar(20) DEFAULT NULL,
  `vchMarca` varchar(20) DEFAULT NULL,
  `vchTalla` varchar(20) DEFAULT NULL,
  `intCantidad` int(11) DEFAULT NULL,
  `fltPrecio` float DEFAULT NULL,
  PRIMARY KEY (`intIdproducto`),
  KEY `idprod` (`vchNombre`,`vchMarca`(10),`vchDescripcion`(20))
) ENGINE=InnoDB AUTO_INCREMENT=56461647 DEFAULT CHARSET=latin1;

/*Data for the table `tblproductos` */

LOCK TABLES `tblproductos` WRITE;

insert  into `tblproductos`(`intIdproducto`,`pro_img`,`vchNombre`,`vchDescripcion`,`vchTipop`,`vchMarca`,`vchTalla`,`intCantidad`,`fltPrecio`) values (3,'rand200-0462-077_zoom1.jpg','Phantom','Tenis Deportivos Nuevos para futbol rapido','Infantiles','aaaaaa','24',-77,500),(4,'randMonterrey-Mens-Home-Football-Soccer-Jersey-Refuse-You-Lose-RefuseYouLose.com_.png','Monterrey','500','Caballeros','Nike','Mediana',20,900),(5,'randmujer1.jpg','Conjunto','Playera y short en color azul','Dama','Nike','Chica',300,800),(6,'rand00108418312768____2__640x640.jpg','Balon #5','color negro','Accesorios','Nike','5',23,600),(7,'randadidas-tacos-de-futbol-predator-18-fg-rosa.jpg','Predator','color rosa','Dama','Adidas','24',200,950),(8,'randshort-corto-sexy-mujer-para-fitness-playa-gym-fresco-algodon-D_NQ_NP_831965-MLM27084479842_032018-F.jpg','short depo','color negro, corto','Dama','Nike','Mediana',500,150),(9,'rand9719130500-351-1_5.jpg','Conjunto','camiseta y short deportivo','Dama','Adidas','Chica',45,300),(1553156,'randtacos-adidas-predator-18-pogba-2018.jpg','Adidas pre','asdasdas','Caballero','Adidas','26',50,200),(56461646,'randbota-nike-mercurial-vapor-xiii-elite-special-edition-fg-laser-orange-black-hyper-crimson-0.jpg','Mercurial ','Tachones deportivos','Caballero','Nike','25',20,1350);

UNLOCK TABLES;

/*Table structure for table `tblprovedor` */

DROP TABLE IF EXISTS `tblprovedor`;

CREATE TABLE `tblprovedor` (
  `vchRFC` varchar(13) NOT NULL,
  `vchEmpresa` varchar(10) NOT NULL,
  `vchNombre` varchar(80) NOT NULL,
  `vchApaterno` varchar(80) NOT NULL,
  `vchAmaterno` varchar(80) NOT NULL,
  `vchCelular` varchar(10) NOT NULL,
  `vchEmail` varchar(50) NOT NULL,
  PRIMARY KEY (`vchRFC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblprovedor` */

LOCK TABLES `tblprovedor` WRITE;

insert  into `tblprovedor`(`vchRFC`,`vchEmpresa`,`vchNombre`,`vchApaterno`,`vchAmaterno`,`vchCelular`,`vchEmail`) values ('ASdasd123','Nike','Rodolfo','Hernandez','Hernandez','1343223423','erika.yo.263@gmail.com'),('asdedwd1212w2','sadaaaa','jhjkkjbhkhj','hjhjhgjhj','hjhjhjhj','1232132321','flos.2017.333@gmail.com');

UNLOCK TABLES;

/*Table structure for table `tblsuministrados_por` */

DROP TABLE IF EXISTS `tblsuministrados_por`;

CREATE TABLE `tblsuministrados_por` (
  `intIdSub` int(11) NOT NULL AUTO_INCREMENT,
  `dtFecha` datetime DEFAULT NULL,
  `fltPrecio` float DEFAULT NULL,
  `intCantidad` int(11) DEFAULT NULL,
  `intIdproducto` int(11) DEFAULT NULL,
  `vchRFC` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`intIdSub`),
  KEY `intIdproducto` (`intIdproducto`),
  KEY `vchRFC` (`vchRFC`),
  CONSTRAINT `tblsuministrados_por_ibfk_1` FOREIGN KEY (`intIdproducto`) REFERENCES `tblproductos` (`intIdproducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblsuministrados_por_ibfk_2` FOREIGN KEY (`vchRFC`) REFERENCES `tblprovedor` (`vchRFC`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblsuministrados_por` */

LOCK TABLES `tblsuministrados_por` WRITE;

insert  into `tblsuministrados_por`(`intIdSub`,`dtFecha`,`fltPrecio`,`intCantidad`,`intIdproducto`,`vchRFC`) values (3,'2019-07-10 16:02:00',1200,20,4,'ASdasd123'),(4,'2019-07-02 03:04:00',14000,20,5,'ASdasd123');

UNLOCK TABLES;

/*Table structure for table `tbltipouser` */

DROP TABLE IF EXISTS `tbltipouser`;

CREATE TABLE `tbltipouser` (
  `intTipoUser` int(11) NOT NULL AUTO_INCREMENT,
  `vchTipo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`intTipoUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbltipouser` */

LOCK TABLES `tbltipouser` WRITE;

insert  into `tbltipouser`(`intTipoUser`,`vchTipo`) values (1,'Admin'),(2,'Premium'),(3,'Usuario');

UNLOCK TABLES;

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `intIdUser` int(11) NOT NULL AUTO_INCREMENT,
  `vchUser` varchar(20) DEFAULT NULL,
  `vchPassword` varchar(20) DEFAULT NULL,
  `intIdcliente` int(11) DEFAULT NULL,
  `vchRFC` varchar(13) DEFAULT NULL,
  `intTipoUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`intIdUser`),
  UNIQUE KEY `idusuario` (`vchUser`),
  KEY `intTipoUser` (`intTipoUser`),
  KEY `tbluser_ibfk_1` (`intIdcliente`),
  KEY `tbluser_ibfk_2` (`vchRFC`),
  CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`intIdcliente`) REFERENCES `tblcliente` (`intIdcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbluser_ibfk_2` FOREIGN KEY (`vchRFC`) REFERENCES `tblprovedor` (`vchRFC`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbluser_ibfk_3` FOREIGN KEY (`intTipoUser`) REFERENCES `tbltipouser` (`intTipoUser`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `tbluser` */

LOCK TABLES `tbluser` WRITE;

insert  into `tbluser`(`intIdUser`,`vchUser`,`vchPassword`,`intIdcliente`,`vchRFC`,`intTipoUser`) values (9,'Angel','qwerty',13,NULL,3),(10,'admin1','messi100',NULL,NULL,1),(14,'Marcos','12345',14,NULL,3);

UNLOCK TABLES;

/*Table structure for table `tblventa` */

DROP TABLE IF EXISTS `tblventa`;

CREATE TABLE `tblventa` (
  `intIdventa` int(11) NOT NULL AUTO_INCREMENT,
  `dtFecha` datetime DEFAULT NULL,
  `fltPrecio` float DEFAULT NULL,
  `intCantidad` int(11) DEFAULT NULL,
  `intIdproducto` int(11) DEFAULT NULL,
  `intIdcliente` int(11) DEFAULT NULL,
  `intIdmet_pago` int(11) NOT NULL,
  PRIMARY KEY (`intIdventa`),
  KEY `intIdproducto` (`intIdproducto`),
  KEY `intIdcliente` (`intIdcliente`),
  KEY `intIdmet_pago` (`intIdmet_pago`),
  CONSTRAINT `tblventa_ibfk_1` FOREIGN KEY (`intIdproducto`) REFERENCES `tblproductos` (`intIdproducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblventa_ibfk_2` FOREIGN KEY (`intIdcliente`) REFERENCES `tblcliente` (`intIdcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblventa_ibfk_3` FOREIGN KEY (`intIdmet_pago`) REFERENCES `tblmet_pago` (`intIdmet_pago`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tblventa` */

LOCK TABLES `tblventa` WRITE;

insert  into `tblventa`(`intIdventa`,`dtFecha`,`fltPrecio`,`intCantidad`,`intIdproducto`,`intIdcliente`,`intIdmet_pago`) values (9,'2019-07-10 20:01:00',1200,2,4,13,1),(10,'2019-07-02 17:05:00',1000,1,5,13,1),(11,'2019-07-03 14:03:00',1200,1,5,14,1);

UNLOCK TABLES;

/*Table structure for table `tblventprod` */

DROP TABLE IF EXISTS `tblventprod`;

CREATE TABLE `tblventprod` (
  `intIdvp` int(11) NOT NULL AUTO_INCREMENT,
  `intIdproducto` int(11) DEFAULT NULL,
  `intCant` int(11) DEFAULT NULL,
  `fltPU` float DEFAULT NULL,
  `dtFecha` datetime DEFAULT NULL,
  `fltt` float DEFAULT NULL,
  PRIMARY KEY (`intIdvp`),
  KEY `intIdproducto` (`intIdproducto`),
  CONSTRAINT `tblventprod_ibfk_1` FOREIGN KEY (`intIdproducto`) REFERENCES `tblproductos` (`intIdproducto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tblventprod` */

LOCK TABLES `tblventprod` WRITE;

insert  into `tblventprod`(`intIdvp`,`intIdproducto`,`intCant`,`fltPU`,`dtFecha`,`fltt`) values (1,4,2,1200,'2019-07-10 20:01:00',2400),(2,5,1,1000,'2019-07-02 17:05:00',1000),(3,5,1,1200,'2019-07-03 14:03:00',1200);

UNLOCK TABLES;

/* Trigger structure for table `tblcliente` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trg_insertacliente` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trg_insertacliente` AFTER INSERT ON `tblcliente` FOR EACH ROW BEGIN
	INSERT INTO tblbitacora(usuario, fecha, datos_viejos, datos_nuevos, operacion, tabla)
	VALUES(CURRENT_USER(), NOW(), NULL,
	CONCAT("Nombre:", new.vchNombre, " A_Paterno:", new.vchApaterno, " A_Materno:",new.vchAmaterno, "Telefono:",new.vchCelular, "Estado:",new.vchEstado, "Ciudad:",new.vchCiudad, "Calle:",new.vchCalle, "Colonia:",new.vchColonia, "Email:",new.vchEmail), "Insertar", "tblcliente");
    END */$$


DELIMITER ;

/* Trigger structure for table `tblcliente` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trg_actualizacliente` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trg_actualizacliente` AFTER UPDATE ON `tblcliente` FOR EACH ROW BEGIN
	INSERT INTO tblbitacora(usuario, fecha, datos_viejos, datos_nuevos, operacion, tabla)
	VALUES(CURRENT_USER(), NOW(), CONCAT("Nombre:", old.vchNombre, " A_Paterno:", old.vchApaterno, " A_Materno:",old.vchAmaterno, "Telefono:",old.vchCelular, "Estado:",old.vchEstado, "Ciudad:",old.vchCiudad, "Calle:",old.vchCalle, "Colonia:",old.vchColonia, "Email:",old.vchEmail),
	CONCAT("Nombre:", new.vchNombre, " A_Paterno:", new.vchApaterno, " A_Materno:",new.vchAmaterno, "Telefono:",new.vchCelular, "Estado:",new.vchEstado, "Ciudad:",new.vchCiudad, "Calle:",new.vchCalle, "Colonia:",new.vchColonia, "Email:",new.vchEmail), "Actualizar", "tblcliente");
    END */$$


DELIMITER ;

/* Trigger structure for table `tblsuministrados_por` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tginsertaprod` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tginsertaprod` BEFORE INSERT ON `tblsuministrados_por` FOR EACH ROW BEGIN
DECLARE cant INT;
	SET cant=new.intCantidad;
	UPDATE tblproductos SET intCantidad=(cant+intCantidad) WHERE intIdproducto=new.intIdproducto;
   END */$$


DELIMITER ;

/* Trigger structure for table `tbluser` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tgupduser` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tgupduser` BEFORE UPDATE ON `tbluser` FOR EACH ROW BEGIN
IF (NEW.vchPassword IS NULL OR NEW.vchPassword = '') THEN
SET NEW.vchPassword = OLD.vchPassword;
ELSE
SET NEW.vchPassword = NEW.vchPassword;
END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `tblventa` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tgrestaprod` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tgrestaprod` BEFORE INSERT ON `tblventa` FOR EACH ROW BEGIN
DECLARE cant INT;
	SET cant=new.intCantidad;
	UPDATE tblproductos SET intCantidad=(intCantidad-cant) WHERE intIdproducto=new.intIdproducto;
   END */$$


DELIMITER ;

/* Trigger structure for table `tblventa` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tginsertventprod` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tginsertventprod` AFTER INSERT ON `tblventa` FOR EACH ROW BEGIN
DECLARE  t FLOAT;
	SET t=new.fltPrecio*new.intCantidad;
	INSERT INTO tblventprod(IntIdproducto,intCant,dtFecha,fltPU,fltt) VALUES
	(new.intIdproducto,new.intCantidad,new.dtFecha,new.fltPrecio,t);
END */$$


DELIMITER ;

/* Trigger structure for table `tblventa` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tgupdvent` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tgupdvent` BEFORE UPDATE ON `tblventa` FOR EACH ROW BEGIN
DECLARE cant INT;
	SET cant=old.intCantidad-new.intCantidad;
	UPDATE tblproductos SET intCantidad=(cant+intCantidad) WHERE intIdproducto=old.intIdproducto;
   END */$$


DELIMITER ;

/* Trigger structure for table `tblventa` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tgdelvent` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tgdelvent` BEFORE DELETE ON `tblventa` FOR EACH ROW BEGIN
DECLARE cant INT;
	SET cant=old.intCantidad;
	UPDATE tblproductos SET intCantidad=(cant+intCantidad) WHERE intIdproducto=old.intIdproducto;
   END */$$


DELIMITER ;

/* Procedure structure for procedure `spdelcliente` */

/*!50003 DROP PROCEDURE IF EXISTS  `spdelcliente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spdelcliente`(
	IN id INT)
BEGIN
	DELETE FROM tblcliente WHERE intIdcliente=id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spdelprod` */

/*!50003 DROP PROCEDURE IF EXISTS  `spdelprod` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spdelprod`(
	IN id INT)
BEGIN
	DELETE  FROM tblproductos WHERE intIdproducto=id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spdelprov` */

/*!50003 DROP PROCEDURE IF EXISTS  `spdelprov` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spdelprov`(
	IN id VARCHAR(13))
BEGIN
	DELETE FROM tblprovedor WHERE vchRFC=$id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spdeluser` */

/*!50003 DROP PROCEDURE IF EXISTS  `spdeluser` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spdeluser`(
	IN id INT)
BEGIN
	DELETE FROM tbluser WHERE intIdUSer=id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spinsertcliente` */

/*!50003 DROP PROCEDURE IF EXISTS  `spinsertcliente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spinsertcliente`(
	IN nom VARCHAR(80),IN pater VARCHAR(80),IN mater VARCHAR(80),
	IN cel VARCHAR(10),IN est VARCHAR(20),IN ciu VARCHAR(20),
	IN calle VARCHAR(30),IN col VARCHAR(20),IN email VARCHAR(50))
BEGIN
	INSERT INTO tblcliente(vchNombre,vchApaterno,vchAmaterno,vchCelular,vchEstado,vchCiudad,vchCalle,vchColonia,vchEmail)
	VALUES(nom,pater,mater,cel,est,ciu,calle,col,email);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spinsertprod` */

/*!50003 DROP PROCEDURE IF EXISTS  `spinsertprod` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spinsertprod`(
	IN nom VARCHAR(30),IN img TEXT,IN descr VARCHAR(100),
	IN cat VARCHAR(20),IN marca VARCHAR(20), IN talla VARCHAR(20),
	IN cant INT, IN precio FLOAT)
BEGIN
	INSERT INTO tblproductos(vchNombre,pro_img,vchDescripcion,vchTipop,vchMarca,vchTalla,intCantidad,fltPrecio)
	VALUES(nom,img,descr,cat,marca,talla,cant,precio);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spinsertprov` */

/*!50003 DROP PROCEDURE IF EXISTS  `spinsertprov` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spinsertprov`( IN rfc VARCHAR(13),IN empresa VARCHAR(10),
	IN nom VARCHAR(80),IN pater VARCHAR(80),IN mater VARCHAR(80),
	IN cel VARCHAR(10),IN email VARCHAR(50))
BEGIN
	INSERT INTO tblprovedor(vchRFC,vchEmpresa,vchNombre,vchApaterno,vchAmaterno,vchCelular,vchEmail)
	VALUES(rfc,empresa,nom,pater,mater,cel,email);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spinsertuser` */

/*!50003 DROP PROCEDURE IF EXISTS  `spinsertuser` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spinsertuser`(
	IN us VARCHAR(20),
	IN psw VARCHAR(20),
	IN tipo INT)
BEGIN
	INSERT INTO tbluser(vchUser,vchPassword,intTipoUser) VALUES(us,psw,tipo);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spinsertvent` */

/*!50003 DROP PROCEDURE IF EXISTS  `spinsertvent` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spinsertvent`(
IN precio FLOAT,IN cant INT,IN prod INT,IN cli INT, IN pago INT)
BEGIN
INSERT INTO tblventa
		(dtFecha,fltPrecio,intCantidad,intIdproducto,intIdcliente,intIdmet_pago)
		VALUES (NOW() ,precio,cant,prod,cli,pago);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistarbp` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistarbp` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistarbp`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod 
                        WHERE 
                        vchDescripcion LIKE '%balon%'
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistarcliente` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistarcliente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistarcliente`(
IN desde INT,IN pagina INT)
BEGIN
 SELECT * FROM vistacliente LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistarprod` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistarprod` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistarprod`(
IN desde INT,IN pagina INT)
BEGIN
 SELECT * FROM vistaprod LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistarrcp` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistarrcp` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistarrcp`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod WHERE vchDescripcion LIKE '%playera%' OR vchDescripcion LIKE '%Short%' OR vchDescripcion LIKE '%bermudas%' 
OR vchDescripcion LIKE '%sudadera%' OR vchDescripcion LIKE '%chamarra%' OR vchDescripcion LIKE '%pants%' OR
vchDescripcion LIKE '%camiseta%' OR vchDescripcion LIKE '%gorro%' OR vchDescripcion LIKE '%gorra%' AND vchTipop="Caballero" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistarrdp` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistarrdp` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistarrdp`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod WHERE vchDescripcion LIKE '%playera%' OR vchDescripcion LIKE '%Short%' OR vchDescripcion LIKE '%bermudas%' 
OR vchDescripcion LIKE '%sudadera%' OR vchDescripcion LIKE '%chamarra%' OR vchDescripcion LIKE '%pants%' OR
vchDescripcion LIKE '%camiseta%' OR vchDescripcion LIKE '%gorro%' OR vchDescripcion LIKE '%gorra%' AND vchTipop="Dama" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistarrip` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistarrip` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistarrip`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod WHERE vchDescripcion LIKE '%playera%' OR vchDescripcion LIKE '%Short%' OR vchDescripcion LIKE '%bermudas%' 
OR vchDescripcion LIKE '%sudadera%' OR vchDescripcion LIKE '%chamarra%' OR vchDescripcion LIKE '%pants%' OR
vchDescripcion LIKE '%camiseta%' OR vchDescripcion LIKE '%gorro%' OR vchDescripcion LIKE '%gorra%' AND vchTipop="Infantiles" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistarscp` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistarscp` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistarscp`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod 
                        WHERE 
                        vchDescripcion LIKE '%Sandalia%' AND vchTipop="Caballero" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistarsdp` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistarsdp` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistarsdp`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod 
                        WHERE 
                        vchDescripcion LIKE '%Sandalia%' AND vchTipop="Dama" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistarsip` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistarsip` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistarsip`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod 
                        WHERE 
                        vchDescripcion LIKE '%Sandalia%' AND vchTipop="Infantiles" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistartacp` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistartacp` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistartacp`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod 
                        WHERE 
                        vchDescripcion LIKE '%Tachones%' AND vchTipop="Caballero" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistartadp` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistartadp` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistartadp`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod 
                        WHERE 
                        vchDescripcion LIKE '%Tachones%' AND vchTipop="Dama" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistartaip` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistartaip` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistartaip`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod 
                        WHERE 
                        vchDescripcion LIKE '%Tachones%' AND vchTipop="Infantiles" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistartcp` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistartcp` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistartcp`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod 
                        WHERE 
                        vchDescripcion LIKE '%Tenis%' AND vchTipop="Caballero" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistartdp` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistartdp` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistartdp`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod 
                        WHERE 
                        vchDescripcion LIKE '%Tenis%' AND vchTipop="Dama" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistartip` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistartip` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistartip`(
IN desde INT,IN pagina INT)
BEGIN
SELECT * FROM vistaprod 
                        WHERE 
                        vchDescripcion LIKE '%Tenis%' AND vchTipop="Infantiles" 
                        
                        ORDER BY vchNombre ASC LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistprov` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistprov` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistprov`(
IN desde INT,IN pagina INT)
BEGIN
 SELECT * FROM vistaprov LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistsum` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistsum` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistsum`(
IN desde INT,IN pagina INT)
BEGIN
 SELECT * FROM vistasum LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistusuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistusuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistusuario`(
IN desde INT,IN pagina INT)
BEGIN
 SELECT * FROM vistausuario LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `splistventa` */

/*!50003 DROP PROCEDURE IF EXISTS  `splistventa` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `splistventa`(
IN desde INT,IN pagina INT)
BEGIN
 SELECT * FROM vistaventa LIMIT desde,pagina;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spupdcliente` */

/*!50003 DROP PROCEDURE IF EXISTS  `spupdcliente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spupdcliente`(
	IN nom VARCHAR(80),IN pater VARCHAR(80),IN mater VARCHAR(80),
	IN cel VARCHAR(10),IN est VARCHAR(20),IN ciu VARCHAR(20),
	IN calle VARCHAR(30),IN col VARCHAR(20),IN email VARCHAR(50),IN id INT)
BEGIN
UPDATE tblcliente
  SET vchNombre = nom,
    vchApaterno = pater,
    vchAmaterno = mater,
    vchCelular = cel,
    vchEstado = est,
    vchCiudad = ciu,
    vchCalle = calle,
    vchColonia = col 
  WHERE intIdcliente = id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spupdprod` */

/*!50003 DROP PROCEDURE IF EXISTS  `spupdprod` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spupdprod`(
	IN id INT, IN nom VARCHAR(30),IN descr VARCHAR(100),
	IN cat VARCHAR(20),IN marca VARCHAR(20), IN talla VARCHAR(20),
	IN cant INT, IN precio FLOAT)
BEGIN
UPDATE tblproductos 
SET 
 vchDescripcion= descr,
 vchTipop=cat,
 vchMarca=marca, 
 vchTalla=talla,
 fltPrecio=precio,
 intCantidad=cant
WHERE intIdproducto=id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spupdprov` */

/*!50003 DROP PROCEDURE IF EXISTS  `spupdprov` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spupdprov`(IN rfc VARCHAR(13),IN empresa VARCHAR(10),
	IN nom VARCHAR(80),IN pater VARCHAR(80),IN mater VARCHAR(80),
	IN cel VARCHAR(10),IN email VARCHAR(50))
BEGIN
UPDATE tblprovedor
  SET vchNombre = nom,
    vchApaterno = pater,
    vchAmaterno = mater,
    vchCelular = cel,
    vchEmpresa = empresa,
    vchEmail = email 
  WHERE vchRFC= rfc;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spupduser` */

/*!50003 DROP PROCEDURE IF EXISTS  `spupduser` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spupduser`(
	IN us VARCHAR(20),
	IN psw VARCHAR(20),
	IN tipo INT)
BEGIN
	UPDATE tbluser SET vchPassword = psw, intTipoUser = tipo  WHERE vchUser = us;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spupdvent` */

/*!50003 DROP PROCEDURE IF EXISTS  `spupdvent` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spupdvent`(
IN fecha DATETIME, IN precio FLOAT,IN cant INT,IN prod INT,IN cli INT, IN pago INT,IN id INT)
BEGIN
UPDATE tblventa SET dtFecha =fecha,fltPrecio=precio
,intCantidad=cant,intIdproducto=prod,intIdcliente=cli,intIdmet_pago=pago WHERE intIdventa=id;
	END */$$
DELIMITER ;

/*Table structure for table `vistacliente` */

DROP TABLE IF EXISTS `vistacliente`;

/*!50001 DROP VIEW IF EXISTS `vistacliente` */;
/*!50001 DROP TABLE IF EXISTS `vistacliente` */;

/*!50001 CREATE TABLE  `vistacliente`(
 `intIdcliente` int(11) ,
 `vchNombre` varchar(80) ,
 `vchApaterno` varchar(80) ,
 `vchAmaterno` varchar(80) ,
 `vchCelular` varchar(10) ,
 `vchEstado` varchar(20) ,
 `vchCiudad` varchar(20) ,
 `vchCalle` varchar(30) ,
 `vchColonia` varchar(20) ,
 `vchEmail` varchar(50) 
)*/;

/*Table structure for table `vistaprod` */

DROP TABLE IF EXISTS `vistaprod`;

/*!50001 DROP VIEW IF EXISTS `vistaprod` */;
/*!50001 DROP TABLE IF EXISTS `vistaprod` */;

/*!50001 CREATE TABLE  `vistaprod`(
 `intIdproducto` int(11) ,
 `pro_img` text ,
 `vchNombre` varchar(10) ,
 `vchDescripcion` varchar(100) ,
 `vchTipop` varchar(20) ,
 `vchMarca` varchar(20) ,
 `vchTalla` varchar(20) ,
 `intCantidad` int(11) ,
 `fltPrecio` float 
)*/;

/*Table structure for table `vistaprov` */

DROP TABLE IF EXISTS `vistaprov`;

/*!50001 DROP VIEW IF EXISTS `vistaprov` */;
/*!50001 DROP TABLE IF EXISTS `vistaprov` */;

/*!50001 CREATE TABLE  `vistaprov`(
 `vchRFC` varchar(13) ,
 `vchEmpresa` varchar(10) ,
 `vchNombre` varchar(80) ,
 `vchApaterno` varchar(80) ,
 `vchAmaterno` varchar(80) ,
 `vchCelular` varchar(10) ,
 `vchEmail` varchar(50) 
)*/;

/*Table structure for table `vistasum` */

DROP TABLE IF EXISTS `vistasum`;

/*!50001 DROP VIEW IF EXISTS `vistasum` */;
/*!50001 DROP TABLE IF EXISTS `vistasum` */;

/*!50001 CREATE TABLE  `vistasum`(
 `dtFecha` datetime ,
 `fltPrecio` float ,
 `intCantidad` int(11) ,
 `vchRFC` varchar(13) ,
 `vchNombre` varchar(10) ,
 `vchMarca` varchar(20) ,
 `intIdSub` int(11) 
)*/;

/*Table structure for table `vistausuario` */

DROP TABLE IF EXISTS `vistausuario`;

/*!50001 DROP VIEW IF EXISTS `vistausuario` */;
/*!50001 DROP TABLE IF EXISTS `vistausuario` */;

/*!50001 CREATE TABLE  `vistausuario`(
 `vchUser` varchar(20) ,
 `vchPassword` varchar(20) ,
 `vchTipo` varchar(20) ,
 `intIdUser` int(11) 
)*/;

/*Table structure for table `vistaventa` */

DROP TABLE IF EXISTS `vistaventa`;

/*!50001 DROP VIEW IF EXISTS `vistaventa` */;
/*!50001 DROP TABLE IF EXISTS `vistaventa` */;

/*!50001 CREATE TABLE  `vistaventa`(
 `vchNombre` varchar(10) ,
 `vchMarca` varchar(20) ,
 `intCantidad` int(11) ,
 `dtFecha` datetime ,
 `fltPrecio` float ,
 `intIdventa` int(11) 
)*/;

/*View structure for view vistacliente */

/*!50001 DROP TABLE IF EXISTS `vistacliente` */;
/*!50001 DROP VIEW IF EXISTS `vistacliente` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistacliente` AS select `tblcliente`.`intIdcliente` AS `intIdcliente`,`tblcliente`.`vchNombre` AS `vchNombre`,`tblcliente`.`vchApaterno` AS `vchApaterno`,`tblcliente`.`vchAmaterno` AS `vchAmaterno`,`tblcliente`.`vchCelular` AS `vchCelular`,`tblcliente`.`vchEstado` AS `vchEstado`,`tblcliente`.`vchCiudad` AS `vchCiudad`,`tblcliente`.`vchCalle` AS `vchCalle`,`tblcliente`.`vchColonia` AS `vchColonia`,`tblcliente`.`vchEmail` AS `vchEmail` from `tblcliente` order by `tblcliente`.`vchApaterno` */;

/*View structure for view vistaprod */

/*!50001 DROP TABLE IF EXISTS `vistaprod` */;
/*!50001 DROP VIEW IF EXISTS `vistaprod` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaprod` AS select `tblproductos`.`intIdproducto` AS `intIdproducto`,`tblproductos`.`pro_img` AS `pro_img`,`tblproductos`.`vchNombre` AS `vchNombre`,`tblproductos`.`vchDescripcion` AS `vchDescripcion`,`tblproductos`.`vchTipop` AS `vchTipop`,`tblproductos`.`vchMarca` AS `vchMarca`,`tblproductos`.`vchTalla` AS `vchTalla`,`tblproductos`.`intCantidad` AS `intCantidad`,`tblproductos`.`fltPrecio` AS `fltPrecio` from `tblproductos` order by `tblproductos`.`vchNombre` */;

/*View structure for view vistaprov */

/*!50001 DROP TABLE IF EXISTS `vistaprov` */;
/*!50001 DROP VIEW IF EXISTS `vistaprov` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaprov` AS select `tblprovedor`.`vchRFC` AS `vchRFC`,`tblprovedor`.`vchEmpresa` AS `vchEmpresa`,`tblprovedor`.`vchNombre` AS `vchNombre`,`tblprovedor`.`vchApaterno` AS `vchApaterno`,`tblprovedor`.`vchAmaterno` AS `vchAmaterno`,`tblprovedor`.`vchCelular` AS `vchCelular`,`tblprovedor`.`vchEmail` AS `vchEmail` from `tblprovedor` order by `tblprovedor`.`vchApaterno` */;

/*View structure for view vistasum */

/*!50001 DROP TABLE IF EXISTS `vistasum` */;
/*!50001 DROP VIEW IF EXISTS `vistasum` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistasum` AS select `tblsuministrados_por`.`dtFecha` AS `dtFecha`,`tblsuministrados_por`.`fltPrecio` AS `fltPrecio`,`tblsuministrados_por`.`intCantidad` AS `intCantidad`,`tblsuministrados_por`.`vchRFC` AS `vchRFC`,`tblproductos`.`vchNombre` AS `vchNombre`,`tblproductos`.`vchMarca` AS `vchMarca`,`tblsuministrados_por`.`intIdSub` AS `intIdSub` from (`tblproductos` join `tblsuministrados_por` on(`tblproductos`.`intIdproducto` = `tblsuministrados_por`.`intIdproducto`)) order by `tblsuministrados_por`.`dtFecha` */;

/*View structure for view vistausuario */

/*!50001 DROP TABLE IF EXISTS `vistausuario` */;
/*!50001 DROP VIEW IF EXISTS `vistausuario` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistausuario` AS select `tbluser`.`vchUser` AS `vchUser`,`tbluser`.`vchPassword` AS `vchPassword`,`tbltipouser`.`vchTipo` AS `vchTipo`,`tbluser`.`intIdUser` AS `intIdUser` from (`tbltipouser` join `tbluser` on(`tbltipouser`.`intTipoUser` = `tbluser`.`intTipoUser`)) order by `tbluser`.`vchUser` */;

/*View structure for view vistaventa */

/*!50001 DROP TABLE IF EXISTS `vistaventa` */;
/*!50001 DROP VIEW IF EXISTS `vistaventa` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaventa` AS select `tblproductos`.`vchNombre` AS `vchNombre`,`tblproductos`.`vchMarca` AS `vchMarca`,`tblventa`.`intCantidad` AS `intCantidad`,`tblventa`.`dtFecha` AS `dtFecha`,`tblventa`.`fltPrecio` AS `fltPrecio`,`tblventa`.`intIdventa` AS `intIdventa` from (`tblproductos` join `tblventa` on(`tblproductos`.`intIdproducto` = `tblventa`.`intIdproducto`)) order by `tblventa`.`dtFecha` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
