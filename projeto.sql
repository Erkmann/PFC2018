-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 18/09/2018 às 08:43
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentar_craques`
--

CREATE TABLE `comentar_craques` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_craques` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `comentar_craques`
--

INSERT INTO `comentar_craques` (`id_comentario`, `id_usuario`, `id_craques`, `txt_comentario`, `dt_comentario`) VALUES
(3, 102, 3, 'Gato pra caramba', '2018-07-26 16:55:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentar_equipes`
--

CREATE TABLE `comentar_equipes` (
  `id_comentario` int(11) NOT NULL,
  `id_equipe` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `comentar_equipes`
--

INSERT INTO `comentar_equipes` (`id_comentario`, `id_equipe`, `id_usuario`, `txt_comentario`, `dt_comentario`) VALUES
(1, 18, 107, 'Alow', '2018-08-12 00:43:18'),
(2, 18, 107, '', '2018-08-12 00:43:22');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentar_esportes`
--

CREATE TABLE `comentar_esportes` (
  `id_comentario` int(11) NOT NULL,
  `id_esporte` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `comentar_esportes`
--

INSERT INTO `comentar_esportes` (`id_comentario`, `id_esporte`, `id_usuario`, `txt_comentario`, `dt_comentario`) VALUES
(27, 3, 104, 'topper', '2018-08-10 17:44:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentar_liga`
--

CREATE TABLE `comentar_liga` (
  `id_comentario` int(11) NOT NULL,
  `id_liga` int(11) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `comentar_liga`
--

INSERT INTO `comentar_liga` (`id_comentario`, `id_liga`, `id_usuario`, `txt_comentario`, `dt_comentario`) VALUES
(23, 1, 102, 'A', '2018-07-24 18:58:13'),
(26, 1, 102, 'C', '2018-07-24 19:12:20'),
(28, 1, 102, 'D', '2018-07-24 20:39:26'),
(29, 1, 103, 'F', '2018-07-24 21:46:57'),
(30, 1, 104, 'topper', '2018-08-10 18:39:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `craques`
--

CREATE TABLE `craques` (
  `id_craques` int(10) NOT NULL,
  `nome_craque` varchar(35) CHARACTER SET utf8 NOT NULL,
  `morte` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nascimento` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `titulos` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `numero_de_jogos` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `icon_craque` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `qtd_curtir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `craques`
--

INSERT INTO `craques` (`id_craques`, `nome_craque`, `morte`, `nascimento`, `titulos`, `numero_de_jogos`, `icon_craque`, `qtd_curtir`) VALUES
(3, 'Andrey Arshavin.', '-', '29 de Maio de 1921', '1 Campeonato Russo, 1 Supercopa da R?ssia, 1 Copa da UEFA e 1 Supercopa Europeia', '75', '../../assets/images/arshavin.jpg', 0),
(6, 'Pel?', '-', '23 de Outubro de 1940.', '10 Campeonatos Paulista, 4 Torneios Rio-S?o Paulo, 6 Campeonatos Brasileiro, 2 Libertadores, 2 Mundiais de Clubes e 3 Copas do Mundo.', '92', '../../assets/images/10082018071020pelezao.jpg', 0),
(7, 'Hidetoshi Nakata.', '-', '22 de Janeiro de 1977.', '1 Campeonato Italiano e 1 Copa da It?lia.', '77', '../../assets/images/10082018072816nakata.jpg', 0),
(8, 'Hugo Sanchez.', '-', '11 de Julho de 1958.', '1 Campeonato Mexicano, 1 Copa da CONCAFAF e 1 Copa do Rei da Espanha.', '70', '../../assets/images/10082018073656hugo-sanchez.jpg', 0),
(9, 'Jan Celeumans.', '-', '28 de Fevereiro de 1957.', '3 Campeonatos Belgas e 2 Copas da B?lgica.', '96', '../../assets/images/10082018074114Jan-Ceulemans-1.jpg', 0),
(10, 'Park Ji-Sung.', '-', '25 de Fevereiro de 1981.', '1 Copa do Imperador do Jap?o, 2 Campeonatos Holand?s, 4 Campeonatos Ingl?s, 3 Copas da Inglaterra, 1 Champions League e 1 Mundial de Clubes.', '100', '../../assets/images/10082018074749parkji-sung3_get_30.jpg', 0),
(11, 'Saeed Al-Owairan.', '-', '19 de Agosto de 1967.', '0', '75', '../../assets/images/10082018075500PA-289270.jpg', 0),
(12, 'Franz Beckenbauer.', '-', '11 de Setembro de 1945.', '3 Champions League, 4 Copas da Alemanha, 5 Campeonatos Alem?o, 1 Copa do Mundo, 1 Eurocopa, 1 Campeonato Estadunidense.', '103', '../../assets/images/10082018080259franz-beckenbauer-adidas-tracksuit-2222.jpeg', 0),
(13, 'Bobby Moore.', '-', '12 de Abril de 1941.', '2 Copas da Inglaterra e 1 Copa do Mundo.', '108', '../../assets/images/10082018080749maxresdefault-5-1024x679.jpg', 0),
(14, 'Raul Gonzalez', '-', '27 de Junho de 1977.', '2 Mundiais de Clubes, 3 Champions League, 6 Campeonatos Espanhol.', '102', '../../assets/images/10082018085547cca4af21708a0ea9.jpg', 0),
(15, 'Jay-Jay Okocha.', '-', '14 de Agosto de 1973.', '1 Copa das Na??es Africanas e 1 Copa da Fran?a.', '75', '../../assets/images/10082018090215Jay-Jay-Okocha.jpg', 0),
(16, 'Bryan Ruiz.', '-', '18 de Agosto de 1985.', '1 Champions League da CONCAFAF, 1 Campeonato Costarriquenho, 1 Campeonato Holand?s, 1 Copa da Holanda e 1 Copa da Liga de Portugal.', '109', '../../assets/images/10082018090753Bryan+Ruiz+Scotland+Vs+Costa+Rica+International+BFmvsYgJetXl.jpg', 0),
(17, 'Zbigniew Boniek.', '-', '3 de Mar?o de 1956.', '2 Campeonatos Polacos.', '80', '../../assets/images/10082018091431polones.jpg', 0),
(18, 'Mohamed Salah.', '-', '15 de Junho de 1992', '1 Campeonato Sui?o, 1 Campeonato Ingl?s e 1 Copa da Inglaterra.', '57', '../../assets/images/10082018092711salah.jpg', 0),
(19, 'Gylfi Sigurdsson.', '-', '8 de Setembro de 1989.', '0', '55', '../../assets/images/10082018092257sigurdsson.jpeg', 0),
(20, 'Vladimir Jugovic.', '-', '30 de Agosto de 1939.', '2 Campeonatos Iugosl?vio, 1 Copa da It?lia, 1 Champions League e 2 Mundiais de Clubes.', '37', '../../assets/images/10082018092600jugovic.jpg', 0),
(21, 'Zinedine Zidane ', '-', '23 de Junho de 1972.', '2 Mundiais de Clubes, 2 Campeonatos Italianos, 1 Champions League, 1 Campeonato Espanhol, 1 Copa do Mundo e 1 Eurocopa.', '108', '../../assets/images/10082018093036zidane.JPG', 0),
(23, 'Diego Armando Maradona.', '-', '30 de Outubro de 1960.', '1 Campeonato Argentino, 1 Copa da Espanha, 1 Campeonato Italiano, 1 Copa da It?lia, 1 Copa do Mundo.', '91', '../../assets/images/10082018094025diego-maradona.jpg', 0),
(24, 'Carlos Valderrama.', '-', '2 de Setembro de 1961.', '1 Copa da Fran?a, 1 Campeonato Colombiano.', '111', '../../assets/images/10082018094801valderrama.jpg', 0),
(25, 'Obdulio Varela.', '-', '20 de Setembro de 1917.', '2 Campeonatos Uruguaio e 1 Copa do Mundo.', '45', '../../assets/images/10082018095102varela.jpg', 0),
(26, 'Dely Vald?s.', '-', '12 de Mar?o de 1967.', '0', '32', '../../assets/images/10082018095258dely-valdes2.jpg', 0),
(27, 'Diouf.', '-', '15 de Janeiro de 1981.', '0', '69.', '../../assets/images/14082018085125AP_02061604297.jpg', 0),
(28, 'Mustapha Hadji.', '-', '16 de Novembro de 1971.', '0', '63', '../../assets/images/1408201809043405e0015552798ac7d892aa0294cc121a.jpg', 0),
(29, 'Chokri El Ouaer.', '-', '15 de Agosto 1966.', '0', '93', '../../assets/images/14082018091240973032404-612x612.jpg', 0),
(30, 'Chapuisat.', '-', '28 de Junho de 1969.', '1 Champions League.', '103', '../../assets/images/14082018091741414321_med__20170706082023_stephane_chapuisat.jpg', 0),
(31, 'Davor Suker.', '-', '1 de Janeiro de 1968.', '1 Campeonato Espanhol, 1 Champions League e 1 Mundial de Clubes.', '69', '../../assets/images/14082018091956davor.jpg', 0),
(32, 'Zlatan Ibrahimovic.', '', '3 de Outubro de 1981.', '2 Campeonatos Holandês, 6 Campeonatos Italianos, 1 Campeonato Espanhol, 1 Mundial de Clubes, 5 Campeonatos Francês, 2 Copas da França e 1 Europa Leagu', '116', '../../assets/images/140820180922346az3caoxd7vgtatfxf4mxpxfr.jpg', 0),
(33, 'Michael Laudrup', '-', '15 de Junho de 1964.', '4 Campeonatos Espanhol e 1 Champions League.', '104', '../../assets/images/14082018092518imgS620I5129T20151014200808.jpg', 0),
(34, 'Tim Cahill', '-', '6 de Dezembro de 1979.', '1 Copa da Ásia e 1 Campeonato Inglês da 3° Divisão.', '104', '../../assets/images/14082018092831tim-cahill.jpg', 0),
(35, 'Teófilo Cubillas.', '-', '8 de Março de 1949.', '2 Campeonatos Peruano, 1 Campeonato Suiço e 1 Copa América.', '117', '../../assets/images/14082018093032cubillas_rep.jpeg', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `curtir_craques`
--

CREATE TABLE `curtir_craques` (
  `id_usuario` int(10) NOT NULL,
  `id_craques` int(10) NOT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curtir` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `curtir_craques`
--

INSERT INTO `curtir_craques` (`id_usuario`, `id_craques`, `dt_curtir`, `curtir`) VALUES
(107, 3, '2018-08-11 17:59:14', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `curtir_equipe`
--

CREATE TABLE `curtir_equipe` (
  `id_equipe` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curtir` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curtir_esportes`
--

CREATE TABLE `curtir_esportes` (
  `id_esporte` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `curtir` tinyint(4) DEFAULT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `curtir_esportes`
--

INSERT INTO `curtir_esportes` (`id_esporte`, `id_usuario`, `curtir`, `dt_curtir`) VALUES
(1, 102, 0, '2018-07-18 17:04:29'),
(1, 103, 0, '2018-07-24 21:45:17'),
(3, 102, 0, '2018-07-26 16:56:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curtir_ligas`
--

CREATE TABLE `curtir_ligas` (
  `id_usuario` int(10) NOT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curtir` tinyint(1) NOT NULL,
  `id_liga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `curtir_ligas`
--

INSERT INTO `curtir_ligas` (`id_usuario`, `dt_curtir`, `curtir`, `id_liga`) VALUES
(103, '2018-07-24 21:46:48', 1, 1),
(104, '2018-08-10 17:44:51', 1, 7),
(106, '2018-08-14 19:30:43', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipes`
--

CREATE TABLE `equipes` (
  `titulos` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `id_equipe` int(10) NOT NULL,
  `fundacao` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nome_equipe` varchar(35) CHARACTER SET utf8 NOT NULL,
  `numero_torcedores` varchar(250) CHARACTER SET utf8 NOT NULL,
  `icon_equipe` varchar(1000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `equipes`
--

INSERT INTO `equipes` (`titulos`, `id_equipe`, `fundacao`, `nome_equipe`, `numero_torcedores`, `icon_equipe`) VALUES
('Títulos: 5 Copas do Mundo, 4 Copas das Confedera??es e 8 Copas Am?rica.', 18, '-', 'Brasil', '-', '../../assets/images/10082018071130brasil.png'),
('0', 19, '-', 'Irã', '-', '../../assets/images/10082018072207Bandeira-do-Ira.png'),
('4 Copas da Ásia.', 20, '-', 'Japão', '-', '../../assets/images/10082018072435bandeira-japao.jpg'),
('1 Copa das Confederações e uma Copa Ouro da Concacaf.', 21, '-', 'México', '-', '../../assets/images/100820180731521200px-Flag_of_Mexico.svg.png'),
('0', 22, '-', 'Bélgica', '-', '../../assets/images/100820180738272000px-Flag_of_Belgium.svg.png'),
('2 Copas da Ásia.', 23, '-', 'Coréia do Sul', '-', '../../assets/images/100820180743211200px-Flag_of_South_Korea.svg.png'),
('0', 24, '-', 'Arábia Saudita', '-', '../../assets/images/10082018075205Bandeira-Arabia-Saudita.jpg'),
('4 Copas do Mundo, 1 Copa das Confederações e 3 Eurocopas.', 25, '-', 'Alemanha', '-', '../../assets/images/10082018075820alemanha.png'),
('1 Copa do Mundo.', 26, '-', 'Inglaterra ', '-', '../../assets/images/10082018080553Bandeira-da-Inglaterra.png'),
('1 Copa do Mundo, 3 Eurocopas.', 27, '-', 'Espanha', '-', '../../assets/images/10082018081335espanha_bandeira.jpg'),
('0', 28, '-', 'Nigéria', '-', '../../assets/images/100820180858411200px-Flag_of_Nigeria.svg.png'),
('3 Copas da Concacaf.', 29, '-', 'Costa Rica', '-', '../../assets/images/100820180905551200px-Flag_of_Costa_Rica_(state).svg.png'),
('0', 30, '-', 'Polônia', '-', '../../assets/images/10082018091311bandeira_polonia_media.jpg'),
('7 Copas das Nações Africanas.', 31, '-', 'Egito', '-', '../../assets/images/10082018091609egito.gif'),
('0', 32, '-', 'Islândia', '-', '../../assets/images/10082018092139islandia.jpg'),
('0', 33, '-', 'Sérvia', '-', '../../assets/images/10082018092427servia.png'),
('1 Copa do Mundo, 2 Copas das Confederações e 2 Eurocopas.', 34, '-', 'França', '-', '../../assets/images/10082018092900fran?a.jpg'),
('1 Eurocopa.', 35, '-', 'Portugal ', '-', '../../assets/images/10082018093200bandeira-portugal.jpg'),
('2 Copas do Mundo, 1 Copa das Confederações e 14 Copas América.', 36, '-', 'Argentina', '-', '../../assets/images/10082018093757argentinaflag_grande.gif'),
('1 Copa América.', 37, '-', 'Colômbia', '-', '../../assets/images/10082018094328bandeira-da-colombia-2000px.png'),
('2 Copas do Mundo, 15 Copas América.', 38, '-', 'Uruguai', '-', '../../assets/images/10082018094949uruguai.jpg'),
('0', 39, '-', 'Panamá', '-', '../../assets/images/10082018095202panama.png'),
('0', 40, '-', 'Senegal', '-', '../../assets/images/140820180850081200px-Flag_of_Senegal.svg.png'),
('1 Copa das Nações Africanas.', 41, '-', 'Marrocos', '-', '../../assets/images/14082018090116bandeira-reino-marrocos.jpg'),
('0', 42, '-', 'Tunísia', '-', '../../assets/images/140820180910351200px-Flag_of_Tunisia.svg.png'),
('0', 43, '-', 'Suiça', '-', '../../assets/images/14082018091448ch.png'),
('0', 44, '-', 'Croácia', '-', '../../assets/images/14082018091835bandeira-croacia.jpg'),
('0', 45, '-', 'Suécia', '-', '../../assets/images/14082018092104se.png'),
('1 Copa das Confederações e 1 Eurocopa.', 46, '-', 'Dinamarca', '-', '../../assets/images/14082018092423bandeira-da-dinamarca-2000px.png'),
('Títulos: 1 Copa da Ásia.', 47, '-', 'Austrália', '-', '../../assets/images/14082018092723flagge-australien.gif'),
('0', 49, '-', 'Peru', '-', '../../assets/images/14082018093213flagge-peru.gif'),
('1 Superliga Série B e 5 Campeonatos Gaúchos', 56, '16 de Dezembro de 2011', 'LEBES CANOAS', 'Canoas, RS', '../../assets/images/16082018041754download.png'),
('3 Campeonatos Mundias, 5 Campeonatos Sul-Americanos, 6 Superligas, 3 Copas Brasil e 9 Campeonatos Mineiros', 57, '2006', 'SADA CRUZEIRO', 'Belo Horizonte, MG', '../../assets/images/16082018042123cruzeiro291.jpg'),
('7 Superligas 2 Campeonatos Sul-Americanos', 58, '15 de novembro de 1935', 'MINAS TENIS CLUBE', 'Belo Horizonte, MG', '../../assets/images/16082018042424Escudo_do_Minas_Tenis_Clube.svg.png'),
('1 Superliga Série B', 59, '1988', 'MONTES CLAROS', 'Montes Claros, MG', '../../assets/images/16082018042802zIdMGopR_400x400.png'),
('2 Copa do Brasil e 4 Campeonato Paulista.', 60, '2010.', 'TAUBATÉ FUNVIC', 'Taubaté, SP.', '../../assets/images/160820180430191sTKd7wA_400x400.jpg'),
('1 Superliga, 4 Campeonato Paulista e 1 Sul-Americano.', 61, '2009', 'SESI-SP', 'São Paulo, SP.', '../../assets/images/16082018043135sesi-quadrado.png'),
('0', 62, '2010.', 'VÔLEI RENATA/CAMPINAS.', 'Campinas, SP.', '../../assets/images/16082018043304Campinas.jpg'),
('0', 63, '2017', 'CORINTHIANS/GUARULHOS', 'Guarulhos, SP', '../../assets/images/16082018043432bandeira-do-corinthians-listrada-100-x-080-metros-D_NQ_NP_887474-MLB25630191534_052017-F.jpg'),
('0', 64, '2016', 'SESC-RJ', 'Rio de Janeiro, RJ.', '../../assets/images/16082018043627logo-sesc.png'),
('0', 65, '2013.', 'CARAMURU-CASTRO', 'Castro, PR.', '../../assets/images/16082018043803Associação_Caramuru_Esportes_de_Castro.png'),
('0', 66, '2012.', 'COPEL TELECOM MARINGÁ', 'Maringá, PR.', '../../assets/images/16082018043940logo-1.png'),
('0', 67, '2008.', 'JF VOLEI', 'Juiz de Fora, MG.', '../../assets/images/16082018044102KkL6_pAB_400x400.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipes_craques`
--

CREATE TABLE `equipes_craques` (
  `id_equipe` int(10) NOT NULL,
  `id_craques` int(10) NOT NULL,
  `id_associativa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `equipes_craques`
--

INSERT INTO `equipes_craques` (`id_equipe`, `id_craques`, `id_associativa`) VALUES
(18, 6, 25),
(31, 18, 41),
(25, 12, 42);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipes_ligas`
--

CREATE TABLE `equipes_ligas` (
  `id_associativa` int(11) NOT NULL,
  `id_equipe` int(10) NOT NULL,
  `id_liga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `equipes_ligas`
--

INSERT INTO `equipes_ligas` (`id_associativa`, `id_equipe`, `id_liga`) VALUES
(58, 18, 1),
(61, 19, 1),
(62, 21, 1),
(63, 22, 1),
(64, 23, 1),
(65, 24, 1),
(66, 25, 1),
(67, 26, 1),
(68, 27, 1),
(69, 28, 1),
(70, 29, 1),
(71, 30, 1),
(72, 31, 1),
(73, 32, 1),
(74, 33, 1),
(75, 34, 1),
(76, 35, 1),
(78, 20, 1),
(79, 36, 1),
(80, 37, 1),
(81, 38, 1),
(82, 39, 1),
(83, 40, 1),
(84, 41, 1),
(85, 42, 1),
(86, 43, 1),
(87, 44, 1),
(88, 45, 1),
(89, 46, 1),
(90, 47, 1),
(91, 49, 1),
(92, 56, 7),
(93, 57, 7),
(94, 58, 7),
(95, 59, 7),
(96, 60, 7),
(97, 61, 7),
(98, 62, 7),
(99, 63, 7),
(100, 64, 7),
(101, 65, 7),
(102, 66, 7),
(103, 67, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `esportes`
--

CREATE TABLE `esportes` (
  `nome_esporte` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `historia` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `id_esporte` int(10) NOT NULL,
  `num_praticantes` varchar(20) CHARACTER SET utf8 NOT NULL,
  `regras` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `icon_esporte` varchar(300) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `esportes`
--

INSERT INTO `esportes` (`nome_esporte`, `historia`, `id_esporte`, `num_praticantes`, `regras`, `icon_esporte`) VALUES
('Futebol', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1, ' 4 bilh?es', 'gdhguyasgbygbaygbyhcyhfdydyfg', '../../assets/images/11082018025040futebol.jpg'),
('Voleibol', 'O v?lei, tamb?m chamado de volley ou voleibol, ? um esporte de origem norte-americana do s?culo XIX. ? um esporte de popularidade significativa em grande parte do mundo, e est? presente em muitos torneios e eventos esportivos de ?mbito internacionais, tais como os Jogos Ol?mpicos e os Jogos Panamericanos. Pode ser praticado tanto em quadras abertas quanto em quadras fechadas, bem como ? praticado quase que igualmente tanto por homens quanto mulheres.', 3, '', 'Uma partida de v?lei tem, normalmente, 5 sets, sem tempo definido. 1. Cada set ? terminado quando uma equipe alcan?a os 25 pontos, tendo 2 pontos de vantagem sobre a equipe advers?ria. Caso n?o tenha, o set prossegue at? que uma equipe conquiste tal vantagem. Cada time ? composto por 6 jogadores em quadra e 6 jogadores reserva. Ap?s o saque, cada time s? poder? tocar a bola tr?s vezes, sendo proibido que um jogador toque a bola duas vezes seguidas. A equipe vencedora ? aquela que ganhar o maior n?mero de sets.', '../../assets/images/volei.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ligas`
--

CREATE TABLE `ligas` (
  `id_liga` int(11) NOT NULL,
  `historia` varchar(1500) CHARACTER SET utf8 NOT NULL,
  `fundacao` varchar(150) CHARACTER SET utf8 NOT NULL,
  `regulamento` varchar(10000) CHARACTER SET utf8 DEFAULT NULL,
  `pais` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `esporte_id_esporte` int(10) DEFAULT NULL,
  `nome_liga` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `icon_liga` varchar(300) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `ligas`
--

INSERT INTO `ligas` (`id_liga`, `historia`, `fundacao`, `regulamento`, `pais`, `esporte_id_esporte`, `nome_liga`, `icon_liga`) VALUES
(1, 'A história da Copa do Mundo de Futebol da FIFA se iniciou em 1928, durante um congresso da entidade, quando Jules Rimet conseguiu a aprovação para criar um torneio internacional. A primeira competição ocorreu em 1930, tendo a participação de 13 equipes convidadas, tendo o Uruguai como país-sede e como campeão.', '1930', 'A Copa do Mundo é disputada atualmente por 32 times e dividida em 8 grupos com 4 seleções cada, sendo jogo único, onde todas as equipes do grupo se enfrentam e os 2 melhores colocados se classificam para a fase de mata-mata.', 'null', 1, 'Copa do Mundo', '../../assets/images/copa.jpg'),
(6, 'Ao longo da história, várias tentativas foram criadas para tentar iniciar um torneio que reunisse os melhores clubes europeus. O primeiro torneio pan-europeu foi o Challenge Cup , uma competição entre clubes no Império Austro-Húngaro. A Mitropa Cup, uma competição inspirada na Copa Challenge, foi criada em 1927, uma ideia do austríaco Hugo Meisl, e foi disputada entre clubes da Europa Central. Em 1930, a Coupe des Nations, a primeira tentativa de criar uma copa para clubes campeões nacionais da Europa, foi jogada e organizada pelo clube suíço Servette. Realizada em Genebra, reuniu dez campeões de todo o continente. O torneio foi conquistado pela ?jpest da Hungria. As nações latino-européias se uniram para formar a Copa Latina em 1949. Até que finalmente em 1955 foi criado uma nova competição, que viria a ser a principal competição de clubes da Europa. A Taça dos Clubes Campeões Europeus (português europeu) ou Copa dos Clubes Campeões Europeus (português brasileiro) foi inspirada no Cam', '1955', 'O torneio come?a com uma fase de grupos de 32 equipes, divididas em oito grupos. Os grupos s?o definidos atrav?s de sorteio, sendo que equipes do mesmo pa?s n?o podem cair em grupos iguais. Cada equipe se encontra com os outros em sua casa e fora em um formato de ida e volta. A equipe vencedora e segundo colocado de cada grupo passam para a pr?xima rodada. A equipe que fica na terceira coloca??o entra na Liga Europa da UEFA.  Para este est?gio, a equipe vencedora de um grupo joga contra os vice-campe?es de outro grupo, e os times da mesma associa??o podem se enfrentar um contra o outro. A partir das quartas de final, o sorteio ? inteiramente aleat?rio, sem prote??o de associa??o. O torneio usa a regra do gol fora de casa: se a pontua??o agregada dos dois jogos estiver empatada, ent?o a equipe que marcou mais golos no est?dio do seu oponente avan?a.  A fase de grupos ocorre de setembro a dezembro, enquanto o mata-mata come?a em fevereiro. O sistema de mata-mata tamb?m ? de ida e volta, ', 'null', 1, 'Champions League', '../../assets/images/champions-league.jpg'),
(7, 'Superliga Brasileira de Voleibol Masculino ? o "nome-fantasia" da principal divis?o do Campeonato Brasileiro de Voleibol. A denomina??o "S?rie A" passou a ser utilizada a partir da temporada 2011/2012, na qual foi criada a S?rie B. Todos os campe?es anteriores da Superliga s?o reconhecidos como campe?es brasileiros de voleibol, assim como todos os campe?es da S?rie A desta temporada em diante. O torneio ? organizado anualmente pela Confedera??o Brasileira de Voleibol (CBV) e d? acesso ao seu campe?o ao Campeonato Sul-Americano de Clubes. Os dois ?ltimos colocados s?o rebaixados ? S?rie B na temporada seguinte.', '2011', 'A forma de disputa tem sido com uma fase classificat?ria em pontos corridos, turno e returno, quartas-de-final definidas em s?rie melhor-de-tr?s, semifinais em melhor-de-cinco e final em jogo ?nico.  O campe?o ganha o direito de disputar o Campeonato Sul-Americano de Clubes.', 'Brasil', 3, 'Superliga Masculina', '../../assets/images/superliga-de-volei-sky.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(10) NOT NULL,
  `nome_tipo_usuario` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nome_tipo_usuario`) VALUES
(1, 'comum'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(40) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `nome_usuario` varchar(64) NOT NULL,
  `tipo_usuario_id_tipo_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`email`, `senha`, `id_usuario`, `nome_usuario`, `tipo_usuario_id_tipo_usuario`) VALUES
('email@email.com', '123', 102, 'Jefferson Chaves', 2),
('suli@suli.suli', 'minhasenha', 103, 'Su', 1),
('vini123@gmail.com', '$2y$10$D/OJZkHv4gQZPY.xl6mzfO5a2noZ9hFYeHUn1OFZ/345ppy90Q86O', 104, 'vini', 2),
('joaovitorjec@gmail.com', '$2y$10$ov2dgwhND0ZQMud30T9pEuEFDZ.UCDs7dlKAOLuQNEFdKlTqy8X9q', 105, 'joao', 2),
('senha@senha', '$2y$10$QqT8yVK3wV1Av/AcyJrkQObWSDrckKKbNzv5fq49ZX6UCQxWkUEd2', 106, 'Russo', 2),
('123@123', '$2y$10$XVw9lnZqrjuQF0fnLzCp0ex8dyLylvkm5ocgD39ChlOj2YBjlwvqS', 107, 'asda', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `comentar_craques`
--
ALTER TABLE `comentar_craques`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_usuario_has_craques_craques1_idx` (`id_craques`),
  ADD KEY `fk_usuario_has_craques_usuario1_idx` (`id_usuario`);

--
-- Índices de tabela `comentar_equipes`
--
ALTER TABLE `comentar_equipes`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_equipes_has_usuario_usuario1_idx` (`id_usuario`),
  ADD KEY `fk_equipes_has_usuario_equipes1_idx` (`id_equipe`);

--
-- Índices de tabela `comentar_esportes`
--
ALTER TABLE `comentar_esportes`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_esportes_has_usuario_usuario1_idx` (`id_usuario`),
  ADD KEY `fk_esportes_has_usuario_esportes1_idx` (`id_esporte`);

--
-- Índices de tabela `comentar_liga`
--
ALTER TABLE `comentar_liga`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_ligas_has_usuario_usuario1_idx` (`id_usuario`),
  ADD KEY `fk_ligas_has_usuario_ligas1_idx` (`id_liga`);

--
-- Índices de tabela `craques`
--
ALTER TABLE `craques`
  ADD PRIMARY KEY (`id_craques`);

--
-- Índices de tabela `curtir_craques`
--
ALTER TABLE `curtir_craques`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_craques` (`id_craques`);

--
-- Índices de tabela `curtir_equipe`
--
ALTER TABLE `curtir_equipe`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_equipe` (`id_equipe`);

--
-- Índices de tabela `curtir_esportes`
--
ALTER TABLE `curtir_esportes`
  ADD KEY `id_esporte` (`id_esporte`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `curtir_ligas`
--
ALTER TABLE `curtir_ligas`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `fk_curtir_ligas_ligas2_idx` (`id_liga`);

--
-- Índices de tabela `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Índices de tabela `equipes_craques`
--
ALTER TABLE `equipes_craques`
  ADD PRIMARY KEY (`id_associativa`),
  ADD KEY `equipes_craques_ibfk_1` (`id_equipe`),
  ADD KEY `equipes_craques_ibfk_2` (`id_craques`);

--
-- Índices de tabela `equipes_ligas`
--
ALTER TABLE `equipes_ligas`
  ADD PRIMARY KEY (`id_associativa`),
  ADD KEY `id_liga` (`id_liga`),
  ADD KEY `id_equipe` (`id_equipe`) USING BTREE;

--
-- Índices de tabela `esportes`
--
ALTER TABLE `esportes`
  ADD PRIMARY KEY (`id_esporte`);

--
-- Índices de tabela `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`id_liga`),
  ADD KEY `id_esporte` (`esporte_id_esporte`);

--
-- Índices de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`tipo_usuario_id_tipo_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `comentar_craques`
--
ALTER TABLE `comentar_craques`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `comentar_equipes`
--
ALTER TABLE `comentar_equipes`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `comentar_esportes`
--
ALTER TABLE `comentar_esportes`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de tabela `comentar_liga`
--
ALTER TABLE `comentar_liga`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de tabela `craques`
--
ALTER TABLE `craques`
  MODIFY `id_craques` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de tabela `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id_equipe` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de tabela `equipes_craques`
--
ALTER TABLE `equipes_craques`
  MODIFY `id_associativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de tabela `equipes_ligas`
--
ALTER TABLE `equipes_ligas`
  MODIFY `id_associativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT de tabela `esportes`
--
ALTER TABLE `esportes`
  MODIFY `id_esporte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id_liga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `comentar_craques`
--
ALTER TABLE `comentar_craques`
  ADD CONSTRAINT `fk_usuario_has_craques_craques1` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_craques_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `comentar_equipes`
--
ALTER TABLE `comentar_equipes`
  ADD CONSTRAINT `fk_equipes_has_usuario_equipes1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipes_has_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `comentar_esportes`
--
ALTER TABLE `comentar_esportes`
  ADD CONSTRAINT `fk_esportes_has_usuario_esportes1` FOREIGN KEY (`id_esporte`) REFERENCES `esportes` (`id_esporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_esportes_has_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `comentar_liga`
--
ALTER TABLE `comentar_liga`
  ADD CONSTRAINT `fk_ligas_has_usuario_ligas1` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id_liga`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ligas_has_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `curtir_craques`
--
ALTER TABLE `curtir_craques`
  ADD CONSTRAINT `curtir_craques_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `curtir_craques_ibfk_2` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`),
  ADD CONSTRAINT `curtir_craques_ibfk_3` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`);

--
-- Restrições para tabelas `curtir_equipe`
--
ALTER TABLE `curtir_equipe`
  ADD CONSTRAINT `curtir_equipe_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `curtir_equipe_ibfk_2` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`),
  ADD CONSTRAINT `curtir_equipe_ibfk_3` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`);

--
-- Restrições para tabelas `curtir_esportes`
--
ALTER TABLE `curtir_esportes`
  ADD CONSTRAINT `curtir_esportes_ibfk_1` FOREIGN KEY (`id_esporte`) REFERENCES `esportes` (`id_esporte`),
  ADD CONSTRAINT `curtir_esportes_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Restrições para tabelas `curtir_ligas`
--
ALTER TABLE `curtir_ligas`
  ADD CONSTRAINT `curtir_ligas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_curtir_ligas_ligas2` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id_liga`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `equipes_craques`
--
ALTER TABLE `equipes_craques`
  ADD CONSTRAINT `equipes_craques_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`),
  ADD CONSTRAINT `equipes_craques_ibfk_2` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`);

--
-- Restrições para tabelas `equipes_ligas`
--
ALTER TABLE `equipes_ligas`
  ADD CONSTRAINT `equipes_ligas_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`),
  ADD CONSTRAINT `equipes_ligas_ibfk_2` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id_liga`);

--
-- Restrições para tabelas `ligas`
--
ALTER TABLE `ligas`
  ADD CONSTRAINT `ligas_ibfk_1` FOREIGN KEY (`esporte_id_esporte`) REFERENCES `esportes` (`id_esporte`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
