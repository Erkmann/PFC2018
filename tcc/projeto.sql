-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: projeto
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comentar_craques`
--

DROP TABLE IF EXISTS `comentar_craques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentar_craques` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `id_craques` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentario`),
  KEY `fk_usuario_has_craques_craques1_idx` (`id_craques`),
  KEY `fk_usuario_has_craques_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_usuario_has_craques_craques1` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_craques_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentar_craques`
--

LOCK TABLES `comentar_craques` WRITE;
/*!40000 ALTER TABLE `comentar_craques` DISABLE KEYS */;
INSERT INTO `comentar_craques` VALUES (3,102,3,'Gato pra caramba','2018-07-26 16:55:31');
/*!40000 ALTER TABLE `comentar_craques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentar_equipes`
--

DROP TABLE IF EXISTS `comentar_equipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentar_equipes` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipe` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentario`),
  KEY `fk_equipes_has_usuario_usuario1_idx` (`id_usuario`),
  KEY `fk_equipes_has_usuario_equipes1_idx` (`id_equipe`),
  CONSTRAINT `fk_equipes_has_usuario_equipes1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipes_has_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentar_equipes`
--

LOCK TABLES `comentar_equipes` WRITE;
/*!40000 ALTER TABLE `comentar_equipes` DISABLE KEYS */;
INSERT INTO `comentar_equipes` VALUES (1,18,107,'Alow','2018-08-12 00:43:18'),(2,18,107,'','2018-08-12 00:43:22');
/*!40000 ALTER TABLE `comentar_equipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentar_esportes`
--

DROP TABLE IF EXISTS `comentar_esportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentar_esportes` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_esporte` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentario`),
  KEY `fk_esportes_has_usuario_usuario1_idx` (`id_usuario`),
  KEY `fk_esportes_has_usuario_esportes1_idx` (`id_esporte`),
  CONSTRAINT `fk_esportes_has_usuario_esportes1` FOREIGN KEY (`id_esporte`) REFERENCES `esportes` (`id_esporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_esportes_has_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentar_esportes`
--

LOCK TABLES `comentar_esportes` WRITE;
/*!40000 ALTER TABLE `comentar_esportes` DISABLE KEYS */;
INSERT INTO `comentar_esportes` VALUES (27,3,104,'topper','2018-08-10 17:44:33');
/*!40000 ALTER TABLE `comentar_esportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentar_liga`
--

DROP TABLE IF EXISTS `comentar_liga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentar_liga` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_liga` int(11) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentario`),
  KEY `fk_ligas_has_usuario_usuario1_idx` (`id_usuario`),
  KEY `fk_ligas_has_usuario_ligas1_idx` (`id_liga`),
  CONSTRAINT `fk_ligas_has_usuario_ligas1` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id_liga`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ligas_has_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentar_liga`
--

LOCK TABLES `comentar_liga` WRITE;
/*!40000 ALTER TABLE `comentar_liga` DISABLE KEYS */;
INSERT INTO `comentar_liga` VALUES (23,1,102,'A','2018-07-24 18:58:13'),(26,1,102,'C','2018-07-24 19:12:20'),(28,1,102,'D','2018-07-24 20:39:26'),(29,1,103,'F','2018-07-24 21:46:57'),(30,1,104,'topper','2018-08-10 18:39:06');
/*!40000 ALTER TABLE `comentar_liga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `craques`
--

DROP TABLE IF EXISTS `craques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `craques` (
  `id_craques` int(10) NOT NULL AUTO_INCREMENT,
  `nome_craque` varchar(35) CHARACTER SET utf8 NOT NULL,
  `morte` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nascimento` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `titulos` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `numero_de_jogos` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `icon_craque` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `qtd_curtir` int(11) NOT NULL,
  PRIMARY KEY (`id_craques`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `craques`
--

LOCK TABLES `craques` WRITE;
/*!40000 ALTER TABLE `craques` DISABLE KEYS */;
INSERT INTO `craques` VALUES (3,'Andrey Arshavin.','-','29 de Maio de 1921','1 Campeonato Russo, 1 Supercopa da R?ssia, 1 Copa da UEFA e 1 Supercopa Europeia','75','../../assets/images/arshavin.jpg',0),(6,'Pel?','-','23 de Outubro de 1940.','10 Campeonatos Paulista, 4 Torneios Rio-S?o Paulo, 6 Campeonatos Brasileiro, 2 Libertadores, 2 Mundiais de Clubes e 3 Copas do Mundo.','92','../../assets/images/10082018071020pelezao.jpg',0),(7,'Hidetoshi Nakata.','-','22 de Janeiro de 1977.','1 Campeonato Italiano e 1 Copa da It?lia.','77','../../assets/images/10082018072816nakata.jpg',0),(8,'Hugo Sanchez.','-','11 de Julho de 1958.','1 Campeonato Mexicano, 1 Copa da CONCAFAF e 1 Copa do Rei da Espanha.','70','../../assets/images/10082018073656hugo-sanchez.jpg',0),(9,'Jan Celeumans.','-','28 de Fevereiro de 1957.','3 Campeonatos Belgas e 2 Copas da B?lgica.','96','../../assets/images/10082018074114Jan-Ceulemans-1.jpg',0),(10,'Park Ji-Sung.','-','25 de Fevereiro de 1981.','1 Copa do Imperador do Jap?o, 2 Campeonatos Holand?s, 4 Campeonatos Ingl?s, 3 Copas da Inglaterra, 1 Champions League e 1 Mundial de Clubes.','100','../../assets/images/10082018074749parkji-sung3_get_30.jpg',0),(11,'Saeed Al-Owairan.','-','19 de Agosto de 1967.','0','75','../../assets/images/10082018075500PA-289270.jpg',0),(12,'Franz Beckenbauer.','-','11 de Setembro de 1945.','3 Champions League, 4 Copas da Alemanha, 5 Campeonatos Alem?o, 1 Copa do Mundo, 1 Eurocopa, 1 Campeonato Estadunidense.','103','../../assets/images/10082018080259franz-beckenbauer-adidas-tracksuit-2222.jpeg',0),(13,'Bobby Moore.','-','12 de Abril de 1941.','2 Copas da Inglaterra e 1 Copa do Mundo.','108','../../assets/images/10082018080749maxresdefault-5-1024x679.jpg',0),(14,'Raul Gonzalez','-','27 de Junho de 1977.','2 Mundiais de Clubes, 3 Champions League, 6 Campeonatos Espanhol.','102','../../assets/images/10082018085547cca4af21708a0ea9.jpg',0),(15,'Jay-Jay Okocha.','-','14 de Agosto de 1973.','1 Copa das Na??es Africanas e 1 Copa da Fran?a.','75','../../assets/images/10082018090215Jay-Jay-Okocha.jpg',0),(16,'Bryan Ruiz.','-','18 de Agosto de 1985.','1 Champions League da CONCAFAF, 1 Campeonato Costarriquenho, 1 Campeonato Holand?s, 1 Copa da Holanda e 1 Copa da Liga de Portugal.','109','../../assets/images/10082018090753Bryan+Ruiz+Scotland+Vs+Costa+Rica+International+BFmvsYgJetXl.jpg',0),(17,'Zbigniew Boniek.','-','3 de Mar?o de 1956.','2 Campeonatos Polacos.','80','../../assets/images/10082018091431polones.jpg',0),(18,'Mohamed Salah.','-','15 de Junho de 1992','1 Campeonato Sui?o, 1 Campeonato Ingl?s e 1 Copa da Inglaterra.','57','../../assets/images/10082018092711salah.jpg',0),(19,'Gylfi Sigurdsson.','-','8 de Setembro de 1989.','0','55','../../assets/images/10082018092257sigurdsson.jpeg',0),(20,'Vladimir Jugovic.','-','30 de Agosto de 1939.','2 Campeonatos Iugosl?vio, 1 Copa da It?lia, 1 Champions League e 2 Mundiais de Clubes.','37','../../assets/images/10082018092600jugovic.jpg',0),(21,'Zinedine Zidane ','-','23 de Junho de 1972.','2 Mundiais de Clubes, 2 Campeonatos Italianos, 1 Champions League, 1 Campeonato Espanhol, 1 Copa do Mundo e 1 Eurocopa.','108','../../assets/images/10082018093036zidane.JPG',0),(23,'Diego Armando Maradona.','-','30 de Outubro de 1960.','1 Campeonato Argentino, 1 Copa da Espanha, 1 Campeonato Italiano, 1 Copa da It?lia, 1 Copa do Mundo.','91','../../assets/images/10082018094025diego-maradona.jpg',0),(24,'Carlos Valderrama.','-','2 de Setembro de 1961.','1 Copa da Fran?a, 1 Campeonato Colombiano.','111','../../assets/images/10082018094801valderrama.jpg',0),(25,'Obdulio Varela.','-','20 de Setembro de 1917.','2 Campeonatos Uruguaio e 1 Copa do Mundo.','45','../../assets/images/10082018095102varela.jpg',0),(26,'Dely Vald?s.','-','12 de Mar?o de 1967.','0','32','../../assets/images/10082018095258dely-valdes2.jpg',0);
/*!40000 ALTER TABLE `craques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curtir_craques`
--

DROP TABLE IF EXISTS `curtir_craques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curtir_craques` (
  `id_usuario` int(10) NOT NULL,
  `id_craques` int(10) NOT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curtir` tinyint(1) DEFAULT NULL,
  KEY `id_usuario` (`id_usuario`),
  KEY `id_craques` (`id_craques`),
  CONSTRAINT `curtir_craques_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `curtir_craques_ibfk_2` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`),
  CONSTRAINT `curtir_craques_ibfk_3` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curtir_craques`
--

LOCK TABLES `curtir_craques` WRITE;
/*!40000 ALTER TABLE `curtir_craques` DISABLE KEYS */;
INSERT INTO `curtir_craques` VALUES (107,3,'2018-08-11 17:59:14',1);
/*!40000 ALTER TABLE `curtir_craques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curtir_equipe`
--

DROP TABLE IF EXISTS `curtir_equipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curtir_equipe` (
  `id_equipe` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curtir` tinyint(1) NOT NULL,
  KEY `id_usuario` (`id_usuario`),
  KEY `id_equipe` (`id_equipe`),
  CONSTRAINT `curtir_equipe_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `curtir_equipe_ibfk_2` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`),
  CONSTRAINT `curtir_equipe_ibfk_3` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curtir_equipe`
--

LOCK TABLES `curtir_equipe` WRITE;
/*!40000 ALTER TABLE `curtir_equipe` DISABLE KEYS */;
/*!40000 ALTER TABLE `curtir_equipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curtir_esportes`
--

DROP TABLE IF EXISTS `curtir_esportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curtir_esportes` (
  `id_esporte` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `curtir` tinyint(4) DEFAULT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `id_esporte` (`id_esporte`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `curtir_esportes_ibfk_1` FOREIGN KEY (`id_esporte`) REFERENCES `esportes` (`id_esporte`),
  CONSTRAINT `curtir_esportes_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curtir_esportes`
--

LOCK TABLES `curtir_esportes` WRITE;
/*!40000 ALTER TABLE `curtir_esportes` DISABLE KEYS */;
INSERT INTO `curtir_esportes` VALUES (1,102,0,'2018-07-18 17:04:29'),(1,103,0,'2018-07-24 21:45:17'),(3,102,0,'2018-07-26 16:56:33');
/*!40000 ALTER TABLE `curtir_esportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curtir_ligas`
--

DROP TABLE IF EXISTS `curtir_ligas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curtir_ligas` (
  `id_usuario` int(10) NOT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curtir` tinyint(1) NOT NULL,
  `id_liga` int(11) NOT NULL,
  KEY `id_usuario` (`id_usuario`),
  KEY `fk_curtir_ligas_ligas2_idx` (`id_liga`),
  CONSTRAINT `curtir_ligas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `fk_curtir_ligas_ligas2` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id_liga`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curtir_ligas`
--

LOCK TABLES `curtir_ligas` WRITE;
/*!40000 ALTER TABLE `curtir_ligas` DISABLE KEYS */;
INSERT INTO `curtir_ligas` VALUES (103,'2018-07-24 21:46:48',1,1),(104,'2018-08-10 17:44:51',1,7);
/*!40000 ALTER TABLE `curtir_ligas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipes`
--

DROP TABLE IF EXISTS `equipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipes` (
  `titulos` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `id_equipe` int(10) NOT NULL AUTO_INCREMENT,
  `fundacao` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nome_equipe` varchar(35) CHARACTER SET utf8 NOT NULL,
  `numero_torcedores` varchar(11) CHARACTER SET utf8 NOT NULL,
  `icon_equipe` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipes`
--

LOCK TABLES `equipes` WRITE;
/*!40000 ALTER TABLE `equipes` DISABLE KEYS */;
INSERT INTO `equipes` VALUES ('Títulos: 5 Copas do Mundo, 4 Copas das Confedera??es e 8 Copas Am?rica.',18,'-','Brasil','-','../../assets/images/10082018071130brasil.png'),('0',19,'-','Ir?','-','../../assets/images/10082018072207Bandeira-do-Ira.png'),('4 Copas da ?sia.',20,'-','Jap?o','-','../../assets/images/10082018072435bandeira-japao.jpg'),('1 Copa das Confedera??es e uma Copa Ouro da Concacaf.',21,'-','Mexico','-','../../assets/images/100820180731521200px-Flag_of_Mexico.svg.png'),('0',22,'-','Belgica','-','../../assets/images/100820180738272000px-Flag_of_Belgium.svg.png'),('2 Copas da ?sia.',23,'-','Coreia do Sul','-','../../assets/images/100820180743211200px-Flag_of_South_Korea.svg.png'),('0',24,'-','Arabia Saudita','-','../../assets/images/10082018075205Bandeira-Arabia-Saudita.jpg'),('4 Copas do Mundo, 1 Copa das Confedera??es e 3 Eurocopas.',25,'-','Alemanha','-','../../assets/images/10082018075820alemanha.png'),('1 Copa do Mundo.',26,'-','Inglaterra ','-','../../assets/images/10082018080553Bandeira-da-Inglaterra.png'),('1 Copa do Mundo, 3 Eurocopas.',27,'-','Espanha','-','../../assets/images/10082018081335espanha_bandeira.jpg'),('0',28,'-','Nigeria','-','../../assets/images/100820180858411200px-Flag_of_Nigeria.svg.png'),('3 Copas da Concacaf.',29,'-','Costa Rica','-','../../assets/images/100820180905551200px-Flag_of_Costa_Rica_(state).svg.png'),('0',30,'-','Polonia','-','../../assets/images/10082018091311bandeira_polonia_media.jpg'),('7 Copas das Na??es Africanas.',31,'-','Egito','-','../../assets/images/10082018091609egito.gif'),('0',32,'-','Islandia','-','../../assets/images/10082018092139islandia.jpg'),('0',33,'-','Servia','-','../../assets/images/10082018092427servia.png'),('1 Copa do Mundo, 2 Copas das Confedera??es e 2 Eurocopas.',34,'-','Fran?a','-','../../assets/images/10082018092900fran?a.jpg'),('1 Eurocopa.',35,'-','Portugal ','-','../../assets/images/10082018093200bandeira-portugal.jpg'),('T?tulos: 2 Copas do Mundo, 1 Copa das Confedera??es e 14 Copas Am?rica.',36,'-','Argentina','-','../../assets/images/10082018093757argentinaflag_grande.gif'),('1 Copa Am?rica.',37,'-','Colombia','-','../../assets/images/10082018094328bandeira-da-colombia-2000px.png'),('2 Copas do Mundo, 15 Copas Am?rica.',38,'-','Uruguai','-','../../assets/images/10082018094949uruguai.jpg'),('0',39,'-','Panam?','-','../../assets/images/10082018095202panama.png');
/*!40000 ALTER TABLE `equipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipes_craques`
--

DROP TABLE IF EXISTS `equipes_craques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipes_craques` (
  `id_equipe` int(10) NOT NULL,
  `id_craques` int(10) NOT NULL,
  `id_associativa` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_associativa`),
  KEY `equipes_craques_ibfk_1` (`id_equipe`),
  KEY `equipes_craques_ibfk_2` (`id_craques`),
  CONSTRAINT `equipes_craques_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`),
  CONSTRAINT `equipes_craques_ibfk_2` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipes_craques`
--

LOCK TABLES `equipes_craques` WRITE;
/*!40000 ALTER TABLE `equipes_craques` DISABLE KEYS */;
INSERT INTO `equipes_craques` VALUES (18,6,25),(31,18,41),(25,12,42);
/*!40000 ALTER TABLE `equipes_craques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipes_ligas`
--

DROP TABLE IF EXISTS `equipes_ligas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipes_ligas` (
  `id_associativa` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipe` int(10) NOT NULL,
  `id_liga` int(10) NOT NULL,
  PRIMARY KEY (`id_associativa`),
  KEY `id_liga` (`id_liga`),
  KEY `id_equipe` (`id_equipe`) USING BTREE,
  CONSTRAINT `equipes_ligas_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`),
  CONSTRAINT `equipes_ligas_ibfk_2` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id_liga`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipes_ligas`
--

LOCK TABLES `equipes_ligas` WRITE;
/*!40000 ALTER TABLE `equipes_ligas` DISABLE KEYS */;
INSERT INTO `equipes_ligas` VALUES (35,37,1),(41,18,1);
/*!40000 ALTER TABLE `equipes_ligas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `esportes`
--

DROP TABLE IF EXISTS `esportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `esportes` (
  `nome_esporte` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `historia` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `id_esporte` int(10) NOT NULL AUTO_INCREMENT,
  `num_praticantes` varchar(20) CHARACTER SET utf8 NOT NULL,
  `regras` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `icon_esporte` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_esporte`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esportes`
--

LOCK TABLES `esportes` WRITE;
/*!40000 ALTER TABLE `esportes` DISABLE KEYS */;
INSERT INTO `esportes` VALUES ('Futebol','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',1,' 4 bilh?es','gdhguyasgbygbaygbyhcyhfdydyfg','../../assets/images/11082018025040futebol.jpg'),('Voleibol','O v?lei, tamb?m chamado de volley ou voleibol, ? um esporte de origem norte-americana do s?culo XIX. ? um esporte de popularidade significativa em grande parte do mundo, e est? presente em muitos torneios e eventos esportivos de ?mbito internacionais, tais como os Jogos Ol?mpicos e os Jogos Panamericanos. Pode ser praticado tanto em quadras abertas quanto em quadras fechadas, bem como ? praticado quase que igualmente tanto por homens quanto mulheres.',3,'','Uma partida de v?lei tem, normalmente, 5 sets, sem tempo definido. 1. Cada set ? terminado quando uma equipe alcan?a os 25 pontos, tendo 2 pontos de vantagem sobre a equipe advers?ria. Caso n?o tenha, o set prossegue at? que uma equipe conquiste tal vantagem. Cada time ? composto por 6 jogadores em quadra e 6 jogadores reserva. Ap?s o saque, cada time s? poder? tocar a bola tr?s vezes, sendo proibido que um jogador toque a bola duas vezes seguidas. A equipe vencedora ? aquela que ganhar o maior n?mero de sets.','../../assets/images/volei.jpg'),('Rãgby','ontem',4,'2','nao existem règras','../../assets/images/11082018092840projetoLogico.png');
/*!40000 ALTER TABLE `esportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ligas`
--

DROP TABLE IF EXISTS `ligas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ligas` (
  `id_liga` int(11) NOT NULL AUTO_INCREMENT,
  `historia` varchar(1500) CHARACTER SET utf8 NOT NULL,
  `fundacao` varchar(150) CHARACTER SET utf8 NOT NULL,
  `regulamento` varchar(10000) CHARACTER SET utf8 DEFAULT NULL,
  `pais` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `esporte_id_esporte` int(10) DEFAULT NULL,
  `nome_liga` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `icon_liga` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_liga`),
  KEY `id_esporte` (`esporte_id_esporte`),
  CONSTRAINT `ligas_ibfk_1` FOREIGN KEY (`esporte_id_esporte`) REFERENCES `esportes` (`id_esporte`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ligas`
--

LOCK TABLES `ligas` WRITE;
/*!40000 ALTER TABLE `ligas` DISABLE KEYS */;
INSERT INTO `ligas` VALUES (1,'A história da Copa do Mundo de Futebol da FIFA se iniciou em 1928, durante um congresso da entidade, quando Jules Rimet conseguiu a aprovação para criar um torneio internacional. A primeira competição ocorreu em 1930, tendo a participação de 13 equipes convidadas, tendo o Uruguai como país-sede e como campeão.','1930','A Copa do Mundo é disputada atualmente por 32 times e dividida em 8 grupos com 4 seleções cada, sendo jogo único, onde todas as equipes do grupo se enfrentam e os 2 melhores colocados se classificam para a fase de mata-mata.','null',1,'Copa do Mundo','../../assets/images/copa.jpg'),(6,'Ao longo da história, várias tentativas foram criadas para tentar iniciar um torneio que reunisse os melhores clubes europeus. O primeiro torneio pan-europeu foi o Challenge Cup , uma competição entre clubes no Império Austro-Húngaro. A Mitropa Cup, uma competição inspirada na Copa Challenge, foi criada em 1927, uma ideia do austríaco Hugo Meisl, e foi disputada entre clubes da Europa Central. Em 1930, a Coupe des Nations, a primeira tentativa de criar uma copa para clubes campeões nacionais da Europa, foi jogada e organizada pelo clube suíço Servette. Realizada em Genebra, reuniu dez campeões de todo o continente. O torneio foi conquistado pela ?jpest da Hungria. As nações latino-européias se uniram para formar a Copa Latina em 1949. Até que finalmente em 1955 foi criado uma nova competição, que viria a ser a principal competição de clubes da Europa. A Taça dos Clubes Campeões Europeus (português europeu) ou Copa dos Clubes Campeões Europeus (português brasileiro) foi inspirada no Cam','1955','O torneio come?a com uma fase de grupos de 32 equipes, divididas em oito grupos. Os grupos s?o definidos atrav?s de sorteio, sendo que equipes do mesmo pa?s n?o podem cair em grupos iguais. Cada equipe se encontra com os outros em sua casa e fora em um formato de ida e volta. A equipe vencedora e segundo colocado de cada grupo passam para a pr?xima rodada. A equipe que fica na terceira coloca??o entra na Liga Europa da UEFA.  Para este est?gio, a equipe vencedora de um grupo joga contra os vice-campe?es de outro grupo, e os times da mesma associa??o podem se enfrentar um contra o outro. A partir das quartas de final, o sorteio ? inteiramente aleat?rio, sem prote??o de associa??o. O torneio usa a regra do gol fora de casa: se a pontua??o agregada dos dois jogos estiver empatada, ent?o a equipe que marcou mais golos no est?dio do seu oponente avan?a.  A fase de grupos ocorre de setembro a dezembro, enquanto o mata-mata come?a em fevereiro. O sistema de mata-mata tamb?m ? de ida e volta, ','null',1,'Champions League','../../assets/images/champions-league.jpg'),(7,'Superliga Brasileira de Voleibol Masculino ? o \"nome-fantasia\" da principal divis?o do Campeonato Brasileiro de Voleibol. A denomina??o \"S?rie A\" passou a ser utilizada a partir da temporada 2011/2012, na qual foi criada a S?rie B. Todos os campe?es anteriores da Superliga s?o reconhecidos como campe?es brasileiros de voleibol, assim como todos os campe?es da S?rie A desta temporada em diante. O torneio ? organizado anualmente pela Confedera??o Brasileira de Voleibol (CBV) e d? acesso ao seu campe?o ao Campeonato Sul-Americano de Clubes. Os dois ?ltimos colocados s?o rebaixados ? S?rie B na temporada seguinte.','2011','A forma de disputa tem sido com uma fase classificat?ria em pontos corridos, turno e returno, quartas-de-final definidas em s?rie melhor-de-tr?s, semifinais em melhor-de-cinco e final em jogo ?nico.  O campe?o ganha o direito de disputar o Campeonato Sul-Americano de Clubes.','Brasil',3,'Superliga Masculina','../../assets/images/superliga-de-volei-sky.jpg');
/*!40000 ALTER TABLE `ligas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nome_tipo_usuario` varchar(9) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'comum'),(2,'admin');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `email` varchar(40) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(64) NOT NULL,
  `tipo_usuario_id_tipo_usuario` int(10) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipo_usuario` (`tipo_usuario_id_tipo_usuario`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('email@email.com','123',102,'Jefferson Chaves',2),('suli@suli.suli','minhasenha',103,'Su',1),('vini123@gmail.com','$2y$10$D/OJZkHv4gQZPY.xl6mzfO5a2noZ9hFYeHUn1OFZ/345ppy90Q86O',104,'vini',2),('joaovitorjec@gmail.com','$2y$10$ov2dgwhND0ZQMud30T9pEuEFDZ.UCDs7dlKAOLuQNEFdKlTqy8X9q',105,'joao',2),('senha@senha','$2y$10$QqT8yVK3wV1Av/AcyJrkQObWSDrckKKbNzv5fq49ZX6UCQxWkUEd2',106,'Russo',2),('123@123','$2y$10$XVw9lnZqrjuQF0fnLzCp0ex8dyLylvkm5ocgD39ChlOj2YBjlwvqS',107,'asda',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-11 21:58:00
