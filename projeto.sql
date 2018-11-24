-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2018 às 00:31
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentar_craques`
--

CREATE TABLE `comentar_craques` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_craques` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentar_equipes`
--

CREATE TABLE `comentar_equipes` (
  `id_comentario` int(11) NOT NULL,
  `id_equipe` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentar_esportes`
--

CREATE TABLE `comentar_esportes` (
  `id_comentario` int(11) NOT NULL,
  `id_esporte` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentar_esportes`
--

INSERT INTO `comentar_esportes` (`id_comentario`, `id_esporte`, `id_usuario`, `txt_comentario`, `dt_comentario`) VALUES
(49, 1, 146, '123', '2018-11-24 23:30:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentar_liga`
--

CREATE TABLE `comentar_liga` (
  `id_comentario` int(11) NOT NULL,
  `id_liga` int(11) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `txt_comentario` text CHARACTER SET utf8 NOT NULL,
  `dt_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `craques`
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
-- Extraindo dados da tabela `craques`
--

INSERT INTO `craques` (`id_craques`, `nome_craque`, `morte`, `nascimento`, `titulos`, `numero_de_jogos`, `icon_craque`, `qtd_curtir`) VALUES
(3, 'Andrey Arshavin.', '-', '29 de Maio de 1921', '1 Campeonato Russo, 1 Supercopa da R?ssia, 1 Copa da UEFA e 1 Supercopa Europeia', '75', '../../assets/images/arshavin.jpg', 0),
(6, 'Pelé', '-', '23 de Outubro de 1940.', '10 Campeonatos Paulista, 4 Torneios Rio-S?o Paulo, 6 Campeonatos Brasileiro, 2 Libertadores, 2 Mundiais de Clubes e 3 Copas do Mundo.', '92', '../../assets/images/10082018071020pelezao.jpg', 0),
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
(26, 'Dely Valdes.', '-', '12 de Mar?o de 1967.', '0', '32', '../../assets/images/10082018095258dely-valdes2.jpg', 0),
(27, 'Diouf.', '-', '15 de Janeiro de 1981.', '0', '69.', '../../assets/images/29102018082506a9de7528550a56103ace0c74e109242a0222c7dd.jpg', 0),
(28, 'Mustapha Hadji.', '-', '16 de Novembro de 1971.', '0', '63', '../../assets/images/2910201808395352faf.jpg', 0),
(29, 'Chokri El Ouaer.', '-', '15 de Agosto 1966.', '0', '93', '../../assets/images/29102018084102IMGBN46861chokri-ouar.jpg', 0),
(30, 'Chapuisat.', '-', '28 de Junho de 1969.', '1 Champions League.', '103', '../../assets/images/29102018084205stphane-chapuisat-35213864-4773-4872-9324-9aec0827e93-resize-750.jpeg', 0),
(31, 'Davor Suker.', '-', '1 de Janeiro de 1968.', '1 Campeonato Espanhol, 1 Champions League e 1 Mundial de Clubes.', '69', '../../assets/images/2910201808423370gfeilogv187ftp8bibh09yj.jpg', 0),
(32, 'Zlatan Ibrahimovic.', '-', '3 de Outubro de 1981.', '2 Campeonatos Holandês, 6 Campeonatos Italianos, 1 Campeonato Espanhol, 1 Mundial de Clubes, 5 Campeonatos Francês, 2 Copas da França e 1 Europa Leagu', '116', '../../assets/images/29102018084340zlatan-ibrahimovic-sweden-euro-2016_lbnncygsmww51f52e2ezyzjme.jpg', 0),
(33, 'Michael Laudrup', '-', '15 de Junho de 1964.', '4 Campeonatos Espanhol e 1 Champions League.', '104', '../../assets/images/2910201808441749375-michael-laudrup-danmarks-bedste-gennem-tiderne--.jpg', 0),
(34, 'Tim Cahill', '-', '6 de Dezembro de 1979.', '1 Copa da Ásia e 1 Campeonato Inglês da 3° Divisão.', '104', '../../assets/images/291020180844489128760-3x2-700x467.jpg', 0),
(35, 'Teófilo Cubillas.', '-', '8 de Março de 1949.', '2 Campeonatos Peruano, 1 Campeonato Suiço e 1 Copa América.', '117', '../../assets/images/2910201808452116370020.jpg', 0),
(36, 'Michael Jordan', '', '17 de Fevereiro de 1963', '6 NBAs e 2 Olimpíadas', '-', '../../assets/images/20112018065459th (1).jpg', 0),
(37, 'Kobe Bryant', '', '23 de Agosto de 1978', '5 NBAs e 2 Olimpíadas', '-', '../../assets/images/20112018065653kobe_bryant_24.jpg', 0),
(38, 'LeBron James', '-', '30 de Dezembro de 1984', '3 NBAs e 2 Olimpíadas', '-', '../../assets/images/20112018065827lebron-james-nba-finals-miami-heat-san-antonio-spurs2.jpg', 0),
(39, 'Magic Johnson', '-', '14 de Agosto de 1959', '1 NBAs e 1 Olimpíada', '-', '../../assets/images/20112018065959GettyImages-242793.0.jpg', 0),
(40, 'Larry Bird', '-', '7 de Dezembro de 1957', '3 NBAs e 1 Olimpíada.', '-', '../../assets/images/20112018070117zlarry.jpeg', 0),
(41, 'Alessandro Rosa Vieira (FALCÃO)', '-', '8 de Junho 1977', '1 Mundial de Clubes, 5 Libertadores, 9 Ligas Futsal, 7 Taças Brasil, 2 Copas do Mundo e 5 Copas América.', '-', '../../assets/images/20112018070721156382619 (1).jpg', 0),
(42, 'Lenísio Teixeira Júnior.', '', '23 de Outubro de 1976', '1 Mundial de Clubes, 3 Ligas Futsal e 1 Copa do Mundo', '', '../../assets/images/20112018070932lenisio-1-credito-muriel-gomes-correio-de-uberlandia.jpg', 0),
(43, 'Carlos Roberto Castro (CHOCO)', '', '12 de Junho de 1971', '1 Copa do Mundo', '', '../../assets/images/20112018071528hqdefault.jpg', 0),
(44, 'Manoel Tobias', '', '19 de Abril de 1971', '2 Copas do Mundo e 7 Copas América', '', '../../assets/images/20112018072058manoel-tobias-vibra-com-gol-marcado-pela-selecao-brasileira-1292619695435_1024x768.jpg', 0),
(45, 'Douglas Pierrotti', '', '22 de Setembro de 1959', '2 Copas do Mundo e 2 Copas América', '', '../../assets/images/2011201807233168330.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtir_craques`
--

CREATE TABLE `curtir_craques` (
  `id_usuario` int(10) NOT NULL,
  `id_craques` int(10) NOT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curtir` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtir_equipe`
--

CREATE TABLE `curtir_equipe` (
  `id_equipe` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curtir` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtir_esportes`
--

CREATE TABLE `curtir_esportes` (
  `id_esporte` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `curtir` tinyint(4) DEFAULT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtir_ligas`
--

CREATE TABLE `curtir_ligas` (
  `id_usuario` int(10) NOT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curtir` tinyint(1) NOT NULL,
  `id_liga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes`
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
-- Extraindo dados da tabela `equipes`
--

INSERT INTO `equipes` (`titulos`, `id_equipe`, `fundacao`, `nome_equipe`, `numero_torcedores`, `icon_equipe`) VALUES
('Títulos: 5 Copas do Mundo, 4 Copas das Confederações e 8 Copas América.', 18, '-', 'Brasil', '-', '../../assets/images/10082018071130brasil.png'),
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
('1 Copa do Mundo, 2 Copas das Confederações e 2 Eurocopas.', 34, '-', 'França', '-', '../../assets/images/29102018075943FLAGFRANÇA.jpg'),
('1 Eurocopa.', 35, '-', 'Portugal ', '-', '../../assets/images/10082018093200bandeira-portugal.jpg'),
('2 Copas do Mundo, 1 Copa das Confederações e 14 Copas América.', 36, '-', 'Argentina', '-', '../../assets/images/10082018093757argentinaflag_grande.gif'),
('1 Copa América.', 37, '-', 'Colômbia', '-', '../../assets/images/10082018094328bandeira-da-colombia-2000px.png'),
('2 Copas do Mundo, 15 Copas América.', 38, '-', 'Uruguai', '-', '../../assets/images/10082018094949uruguai.jpg'),
('0', 39, '-', 'Panamá', '-', '../../assets/images/10082018095202panama.png'),
('0', 40, '-', 'Senegal', '-', '../../assets/images/291020180800491200px-Flag_of_Senegal.svg.png'),
('1 Copa das Nações Africanas.', 41, '-', 'Marrocos', '-', '../../assets/images/29102018080135BANDEIRA-MARROCOS-1024x683.jpg'),
('0', 42, '-', 'Tunísia', '-', '../../assets/images/29102018080220tunisia.png'),
('0', 43, '-', 'Suiça', '-', '../../assets/images/29102018080318bandeira-da-suica-ilustracao-da-bandeira-suica-que-acena_2227-741.jpg'),
('0', 44, '-', 'Croácia', '-', '../../assets/images/29102018080444bandeira-croacia.jpg'),
('0', 45, '-', 'Suécia', '-', '../../assets/images/29102018080525se.png'),
('1 Copa das Confederações e 1 Eurocopa.', 46, '-', 'Dinamarca', '-', '../../assets/images/29102018080608flagge-daenemark.gif'),
('Títulos: 1 Copa da Ásia.', 47, '-', 'Austrália', '-', '../../assets/images/29102018080735curiosidades-sobre-a-bandeira-da-australia-A2.jpg'),
('0', 49, '-', 'Peru', '-', '../../assets/images/29102018080939flagge-peru.gif'),
('1 Superliga Série B e 5 Campeonatos Gaúchos', 56, '16 de Dezembro de 2011', 'LEBES CANOAS', 'Canoas, RS', '../../assets/images/29102018081132LEBES.png'),
('3 Campeonatos Mundias, 5 Campeonatos Sul-Americanos, 6 Superligas, 3 Copas Brasil e 9 Campeonatos Mineiros', 57, '2006', 'SADA CRUZEIRO', 'Belo Horizonte, MG', '../../assets/images/29102018081300Sada_Cruzeiro_Vôlei_Logo.png'),
('7 Superligas 2 Campeonatos Sul-Americanos', 58, '15 de novembro de 1935', 'MINAS TENIS CLUBE', 'Belo Horizonte, MG', '../../assets/images/29102018081339cota-do-minas-tenis-clube_640x480_25_1a1c7636b5e4e935de186e33bf453e085cf03a61ac4600ff20910a2533863e.jpg'),
('1 Superliga Série B', 59, '1988', 'MONTES CLAROS', 'Montes Claros, MG', '../../assets/images/29102018081507zIdMGopR_400x400.png'),
('2 Copa do Brasil e 4 Campeonato Paulista.', 60, '2010.', 'TAUBATÉ FUNVIC', 'Taubaté, SP.', '../../assets/images/291020180815481sTKd7wA_400x400.jpg'),
('1 Superliga, 4 Campeonato Paulista e 1 Sul-Americano.', 61, '2009', 'SESI-SP', 'São Paulo, SP.', '../../assets/images/29102018081629SESI.png'),
('0', 62, '2010.', 'VÔLEI RENATA/CAMPINAS.', 'Campinas, SP.', '../../assets/images/29102018081720Vôlei_Renata.png'),
('0', 63, '2017', 'CORINTHIANS/GUARULHOS', 'Guarulhos, SP', '../../assets/images/29102018081858GAY.png'),
('0', 64, '2016', 'SESC-RJ', 'Rio de Janeiro, RJ.', '../../assets/images/29102018081953SESC.png'),
('0', 65, '2013.', 'CARAMURU-CASTRO', 'Castro, PR.', '../../assets/images/29102018082044Associação_Caramuru_Esportes_de_Castro.png'),
('0', 66, '2012.', 'COPEL TELECOM MARINGÁ', 'Maringá, PR.', '../../assets/images/29102018082322logo-1.png'),
('0', 67, '2008.', 'JF VOLEI', 'Juiz de Fora, MG.', '../../assets/images/29102018082307KkL6_pAB_400x400.jpg'),
('2 Mundiais de Clubes, 3 Champions League, 1 League Europe, 20 Campeonatos Inglês, 12 Copas da Inglaterra e 5 Copas da Liga Inglesa.', 68, '1 de Janeiro de 1878', 'Manchester United', 'Manchester, Inglaterra', '../../assets/images/06112018070244manchester-united-21-df7520066b98f4c82c15131688711093-1024-1024.jpg'),
('3 Copas dos Alpes, 20 Campeonatos Suíços e 12 Copas da Suíça.', 69, '15 de Novembro de 1893.', 'Basel', 'Basel, Suiça', '../../assets/images/0611201807030697105f25143555abcd35bd0ebdb9a290.png'),
('1 Copa da UEFA, 6 Campeonatos Russo e 7 Copas da Rússia', 70, '27 de Agosto de 1911', 'CSKA Moscow', 'Moscow, Rússia', '../../assets/images/06112018070622CSKA_Moscow.png'),
('2 Champions League, 36 Campeonatos Português, 26 Taças de Portugal', 71, '28 de Fevereiro de 1904', 'Benfica', 'Lisboa, Portugal', '../../assets/images/06112018070657benfica-a9696b5bb528248b4315131687788176-1024-1024.jpg'),
('6 Campeonatos Francês e 11 Copas da França.', 72, '12 de Agosto de 1970.', 'PSG', 'Paris, França.', '../../assets/images/06112018070746psg1-1852533775b210999a15131689596423-1024-1024.jpg'),
('5 Champions Leagues, 3 Mundiais de Clubes, 27 Campeonatos Alemão e 18 Copas da Alemanha.', 73, '27 de Fevereiro de 1900.', 'Bayern de Munique', 'Munique, Alemanha.', '../../assets/images/06112018073529bayern-de-munique-5.jpg'),
('1 Champions League, 48 Campeonatos Escocês e 37 Copas da Escócia.', 74, '6 de Novembro de 1888.', 'Celtic', 'Glasgow, Escócia.', '../../assets/images/061120180708400704ed835fe709d3132b.png'),
('1 Europa League, 34 Campeonatos Belga e 9 Copas da Bélgica.', 75, '17 de Maio de 1908.', 'Anderlecht', 'Bruxelas, Bélgica.', '../../assets/images/06112018070958thumb2-anderlecht-4k-logo-jupiler-pro-league-wooden-texture.jpg'),
('3 Campeonatos Italiano e 9 Copas da Itália.', 76, '7 de Junho de 1927.', 'A.S Roma', 'Roma, Itália.', '../../assets/images/06112018071208roma-0565748528340afd4815131686946614-1024-1024.jpg'),
('1 Champions League, 1 Europa League, 6 Campeonatos Inglês e 7 Copas da Inglaterra.', 77, '10 de Março de 1905.', 'Chelsea ', 'Londres, Inglaterra.', '../../assets/images/06112018073512bandeira-chelsea-D_NQ_NP_787965-MLB27952279813_082018-F.jpg'),
('1 Mundial de Clubes, 2 Europa Leagues, 10 Campeonatos Espanhol e 10 Copas do Rei da Espanha.', 78, '26 de Abril de 1903.', 'Atlético de Madrid', 'Madrid, Espanha.', '../../assets/images/06112018073853atletico-de-madrid2-7c8b9768cd72a3ea3f15131687228782-1024-1024.jpg'),
('4 Campeonatos do Azerbaijão e 5 Copas do Azerbaijão.', 79, '23 de Julho de 1951.', 'Qarabag', 'Baku, Azerbaijão.', '../../assets/images/06112018074019FK_Karabakh.png'),
('3 Mundias de Clubes, 5 Champions Leagues, 24 Campeonatos Espanhol e 29 Copas do Rei da Espanha.', 80, '29 de Novembro de 1899.', 'Barcelona', 'Barcelona, Espanha.', '../../assets/images/06112018074137barcelona2-82e9e977201fb207fa15131687509542-1024-1024.jpg'),
('2 Mundiais de Clubes, 2 Champions Leagues, 3 Europa Leagues, 33 Campeonatos Italiano e 12 Copas da Itália.', 81, '1 de Novembro de 1897.', 'Juventus ', 'Turim, Itália.', '../../assets/images/06112018074547bandeira-juventus-escudo-100-x-075-metros-D_NQ_NP_750509-MLB26411353592_112017-F.jpg'),
('17 NBAs', 82, '6 de Junho de 1946', 'BOSTON CELTICS', 'Boston', '../../assets/images/09112018052038tumblr_nz26ruXERA1ufhi8uo2_r1_1280.png'),
('0', 83, '1967', 'BROOKLYN NETS', 'Brooklyn', '../../assets/images/09112018052247bkn.png'),
('2 NBAs', 84, '1946', 'NEW YORK KNICKS', 'New York', '../../assets/images/09112018052433knicks-logo.jpg'),
('3 NBAs', 85, '1939', 'PHILADELPHIA 76ERS', 'Philadelphia', '../../assets/images/09112018053016Color-Philadelphia-76ers-Logo.jpg'),
('0', 86, '1955', 'TORONTO RAPTORS', 'Toronto, Canadá', '../../assets/images/09112018053245tor.png'),
('1 NBA', 87, '1980', 'DALLAS MAVERICK', 'Dallas', '../../assets/images/091120180536451200px-Dallas_Mavericks_logo.svg.png'),
('2 NBAs', 88, '1967', 'HOUSTON ROCKETS', 'Houston', '../../assets/images/091120180538157ac530a177244a75e3967e21c35fb72c-houston-rockets-logotipo-by-vexels.png'),
('0', 89, '1995', 'MEMPHIS GRIZZLIES', 'Memphis', '../../assets/images/091120180540285359_memphis_grizzlies-primary_on_dark-2019.png'),
('0', 90, '2002', 'NEW ORLEANS HORNETS', 'New Orleans', '../../assets/images/09112018054225e50c4efe38b8ac2aeee325cd4d444fa6-new-orleans-hornets-logotipo-by-vexels.png'),
('5 NBAs', 91, '1967', 'SAN ANTONIO SPURS', 'San Antonio', '../../assets/images/091120180544071__93041.1464981357.450.450.jpg'),
('6 NBAs', 92, '1966', 'CHICAGO BULLS', 'Chicago', '../../assets/images/09112018054604Chicago-Bulls-Logo.jpg'),
('1 NBA', 93, '1970', 'CLEVELAND CAVALIERS', 'Cleveland', '../../assets/images/091120180548151440e5d25320aaa1db1d5907c2a75994.png'),
('3 NBAs', 94, '1941', 'DETROIT PISTONS', 'Detroit', '../../assets/images/09112018054921DetroitPistonsOld.png'),
('0', 95, '1967', 'INDIANA PACERS', 'Indianópolis', '../../assets/images/091120180551131200px-Indiana_Pacers.svg.png'),
('1 NBA', 96, '1968', 'MILWAUKEE BUCKS', 'Milwaukee', '../../assets/images/09112018055326cream-fanmats-sports-rugs-18842-64_1000.jpg'),
('0', 97, '1967', 'DENVER NUGGETS', 'Denver', '../../assets/images/09112018055505Denver Nuggets-NBA.png'),
('0', 98, '1989', 'MINN TIMBERWOLVES', 'Minnessota', '../../assets/images/09112018055635timberwolves.jpg'),
('1 NBA', 99, '1970', 'PORTLAND TRAIL BLAZERS', 'Portland', '../../assets/images/091120180557525767.gif'),
('1 NBA', 100, '1967', 'SEATTLE SUPERSONICS', 'Seattle', '../../assets/images/09112018055905v7g28phaqufjua3efwvx.gif'),
('0', 101, '1974', 'UTAH JAZZ', 'Salt Lake City', '../../assets/images/09112018060038Utah-Jazz-16-17-new-f.png'),
('1 NBA', 102, '1946', 'ATLANTA HAWKS', 'Atlanta', '../../assets/images/09112018060151ATLANTA.png'),
('0', 103, '1988', 'CHARLOTTE HORNETS', 'Charlotte', '../../assets/images/09112018060254download.png'),
('3 NBAs', 104, '1988', 'MIAMI HEAT', 'Miami', '../../assets/images/0911201806035990bf8a1f6904eb7df36f2a6a52468acf.png'),
('0', 105, '1989', 'ORLANDO MAGIC', 'Orlando', '../../assets/images/09112018060548ZMAGIC.gif'),
('1 NBA', 106, '1961', 'WASHINGTON WIZARDS', 'Washington', '../../assets/images/09112018060708Washington-Wizards-Logo.png'),
('6 NBAs', 107, '1946', 'GOLDEN STATE WARRIORS', 'Oakland', '../../assets/images/09112018060900ZGOLDEN.jpg'),
('0', 108, '1970', 'LOS ANGELES CLIPPERS', 'Los Angeles', '../../assets/images/09112018060958ZLA.jpg'),
('16 NBAs', 109, '1947', 'LOS ANGELES LAKERS', 'Los Angeles', '../../assets/images/13112018111924zlakers.jpg'),
('0', 110, '1968', 'PHOENIX SUNS', 'Phoenix', '../../assets/images/13112018112055zphoenix.gif'),
('1 NBA', 111, '1948', 'SACRAMENTOS KINGS', 'Sacramento', '../../assets/images/13112018112207zkings.png'),
('3 Mundiais de Clubes, 6 Libertadores, 5 Ligas Nacionais e 11 Campeonatos Gaúcho', 112, '1 de Março de 1976', 'ACBF (Carlos Barbosa)', 'Carlos Barbosa, RS', '../../assets/images/201120181148450000001_zoom_acbf.png'),
('1 Campeonato Gaúcho', 113, '2 de Agosto de 1982', 'ASSOEVA', 'Venâncio Aires, RS', '../../assets/images/20112018115113venancio aires.png'),
('0', 114, '20 de Setembro de 1915', 'ATLÂNTICO', 'Erechim, RS', '../../assets/images/20112018115314zzz.jpg'),
('1 Liga Sul', 115, '5 de Fevereiro de 1964', 'BLUMENAU', 'Blumenau, SC', '../../assets/images/20112018115543zblu.jpg'),
('1 Campeonato Paranaense e 1 taça Paraná', 116, '3 de Janeiro de 1991', 'CASCAVEL', 'Cascavel, PR', '../../assets/images/20112018115737zcas.png'),
('3 Campeonatos Paranaenses e 3 Taças Paraná', 117, '6 de Setembro de 1974', 'COPAGRIL', 'Marechal Cândido Randon, PR', '../../assets/images/20112018115928zzzzz.jpg'),
('1 Liga Nacional, 2 Taças Brasil e 11 Ligas Paulistas', 118, '1950', 'CORINTHIANS', 'São Paulo, SP', '../../assets/images/20112018120036corinthians.jpg'),
('0', 119, '2010', 'FOZ CATARATAS', 'Foz do Iguaçu, PR', '../../assets/images/20112018120229Foz_Cataratas_Futsal.png'),
('2 Ligas Nacionais, 1 Libertadores, 2 Superligas de Futsal e 3 Campeonatos Paulistas', 120, '10 de Dezembro de 1977', 'INTELLI', 'São Sebastião do Paraíso, MG', '../../assets/images/20112018120806fdab39476b6794375834ec7ec6af3ae8--manager-brazil (1).jpg'),
('6 Libertadores, 4 Ligas Nacionais, 7 Taças Brasil e 1 Campeonato Catarinense', 121, '15 de Novembro de 1992', 'JARAGUÁ', 'Jaraguá do Sul, SC', '../../assets/images/20112018121433th.jpg'),
('2 Taças Brasil, 1 Liga Nacional e 5 Campeonatos Catarinenses', 122, '2006', 'JOINVILLE', 'Joinville, SC', '../../assets/images/20112018121554e21da89d7409993eaef1557532c25ab4--times-brasileiros-soccer-teams.jpg'),
('0', 123, '2012', 'JOAÇABA', 'Joaçaba, SC', '../../assets/images/20112018121710Logo-do-Joaçaba-Futsal.jpg'),
('1 Libertadores, 1 Mundial de clubes, 1 liga nacional e 2 ligas paulistas', 124, 'Janeiro de 2014', 'MAGNUS', 'Sorocaba, SP', '../../assets/images/201120181218162016_03_09_EMKT_SINO_MAGNUS_FUTSAL.jpg'),
('1 taça Paraná', 125, '04 de fevereiro de 2007', 'MARRECO', 'Francisco Beltrão, PR', '../../assets/images/20112018122036marreco_futsal.png'),
('2 Taças Brasil, 1 Liga Nacional e 10 campeonatos mineiros', 126, '15 de novembro de 1935', 'MINAS', 'Belo Horizonte, MG', '../../assets/images/201120181221591200px-Crest_of_Minas_Tenis_Clube.svg.png'),
('2 Campeonatos Paranaenses e 1 taça Paraná', 127, '2010', 'PATO', 'Pato Branco, PR', '../../assets/images/20112018122358Pato-Futsal.png'),
('2 Campeonatos Paulistas', 128, '06 de Outubro de 2006', 'SÃO JOSE', 'São José dos Campos, SP', '../../assets/images/20112018122525logo_SaoJoseFutsal-01 (1).png'),
('0', 129, '2018', 'SHOUSE', 'Belém, PA', '../../assets/images/20112018122736shouse-150x150.png'),
('0', 130, '1 de Junho de 2000', 'TUBARÃO', 'Tubarão, SC', '../../assets/images/20112018122848493cc3e159d0d94f8df1c55d584b90db.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes_craques`
--

CREATE TABLE `equipes_craques` (
  `id_equipe` int(10) NOT NULL,
  `id_craques` int(10) NOT NULL,
  `id_associativa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipes_craques`
--

INSERT INTO `equipes_craques` (`id_equipe`, `id_craques`, `id_associativa`) VALUES
(31, 18, 41),
(18, 6, 43),
(40, 27, 44),
(20, 7, 46),
(21, 8, 48),
(22, 9, 49),
(23, 10, 50),
(24, 11, 51),
(25, 12, 52),
(26, 13, 53),
(27, 14, 54),
(28, 15, 55),
(29, 16, 56),
(30, 17, 57),
(32, 19, 58),
(33, 20, 59),
(34, 21, 60),
(36, 23, 61),
(37, 24, 62),
(39, 26, 64),
(38, 25, 71),
(41, 28, 74),
(42, 29, 75),
(43, 30, 76),
(44, 31, 77),
(45, 32, 78),
(46, 33, 79),
(47, 34, 80),
(49, 35, 81),
(92, 36, 87),
(109, 37, 88),
(104, 38, 89),
(109, 39, 90),
(82, 40, 91),
(121, 42, 93),
(112, 43, 96),
(122, 43, 97),
(121, 41, 98),
(124, 41, 99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes_ligas`
--

CREATE TABLE `equipes_ligas` (
  `id_associativa` int(11) NOT NULL,
  `id_equipe` int(10) NOT NULL,
  `id_liga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipes_ligas`
--

INSERT INTO `equipes_ligas` (`id_associativa`, `id_equipe`, `id_liga`) VALUES
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
(76, 35, 1),
(78, 20, 1),
(79, 36, 1),
(80, 37, 1),
(81, 38, 1),
(82, 39, 1),
(104, 18, 1),
(105, 34, 1),
(106, 40, 1),
(107, 41, 1),
(108, 42, 1),
(109, 43, 1),
(110, 44, 1),
(111, 45, 1),
(112, 46, 1),
(113, 47, 1),
(114, 49, 1),
(115, 56, 7),
(116, 57, 7),
(117, 58, 7),
(118, 59, 7),
(119, 60, 7),
(120, 61, 7),
(121, 62, 7),
(122, 63, 7),
(123, 64, 7),
(124, 65, 7),
(126, 67, 7),
(127, 66, 7),
(141, 68, 6),
(142, 69, 6),
(143, 70, 6),
(144, 71, 6),
(146, 72, 6),
(147, 74, 6),
(148, 75, 6),
(149, 76, 6),
(150, 77, 6),
(151, 73, 6),
(153, 78, 6),
(154, 79, 6),
(155, 80, 6),
(157, 81, 6),
(159, 82, 8),
(160, 83, 8),
(161, 84, 8),
(162, 85, 8),
(163, 86, 8),
(164, 87, 8),
(165, 88, 8),
(166, 89, 8),
(167, 90, 8),
(168, 91, 8),
(169, 92, 8),
(170, 93, 8),
(171, 94, 8),
(172, 95, 8),
(173, 96, 8),
(174, 97, 8),
(175, 98, 8),
(176, 99, 8),
(177, 100, 8),
(178, 101, 8),
(179, 102, 8),
(180, 103, 8),
(181, 104, 8),
(182, 105, 8),
(183, 106, 8),
(184, 107, 8),
(185, 108, 8),
(186, 109, 8),
(187, 110, 8),
(188, 111, 8),
(189, 112, 9),
(190, 113, 9),
(191, 114, 9),
(192, 115, 9),
(193, 116, 9),
(194, 117, 9),
(195, 118, 9),
(196, 119, 9),
(197, 120, 9),
(198, 121, 9),
(199, 122, 9),
(200, 123, 9),
(201, 124, 9),
(202, 125, 9),
(203, 126, 9),
(204, 127, 9),
(205, 128, 9),
(206, 129, 9),
(207, 130, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `esportes`
--

CREATE TABLE `esportes` (
  `nome_esporte` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `historia` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `id_esporte` int(10) NOT NULL,
  `num_praticantes` varchar(20) CHARACTER SET utf8 NOT NULL,
  `regras` varchar(10000) CHARACTER SET utf8 DEFAULT NULL,
  `icon_esporte` varchar(300) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `esportes`
--

INSERT INTO `esportes` (`nome_esporte`, `historia`, `id_esporte`, `num_praticantes`, `regras`, `icon_esporte`) VALUES
('Futebol', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1, ' 4 bilhões', 'gdhguyasgbygbaygbyhcyhfdydyfg', '../../assets/images/11082018025040futebol.jpg'),
('Voleibol', 'O v?lei, tamb?m chamado de volley ou voleibol, ? um esporte de origem norte-americana do s?culo XIX. ? um esporte de popularidade significativa em grande parte do mundo, e est? presente em muitos torneios e eventos esportivos de ?mbito internacionais, tais como os Jogos Ol?mpicos e os Jogos Panamericanos. Pode ser praticado tanto em quadras abertas quanto em quadras fechadas, bem como ? praticado quase que igualmente tanto por homens quanto mulheres.', 3, '', 'Uma partida de v?lei tem, normalmente, 5 sets, sem tempo definido. 1. Cada set ? terminado quando uma equipe alcan?a os 25 pontos, tendo 2 pontos de vantagem sobre a equipe advers?ria. Caso n?o tenha, o set prossegue at? que uma equipe conquiste tal vantagem. Cada time ? composto por 6 jogadores em quadra e 6 jogadores reserva. Ap?s o saque, cada time s? poder? tocar a bola tr?s vezes, sendo proibido que um jogador toque a bola duas vezes seguidas. A equipe vencedora ? aquela que ganhar o maior n?mero de sets.', '../../assets/images/volei.jpg'),
('Basquetebol', 'O basquetebol ou bola ao cesto é um jogo desportivo coletivo inventado em 1891 pelo professor de Educação Física canadense James Naismit, na Associação Cristã de Rapazes de Springfield, Massachusetts, Estados Unidos. É disputado por duas equipes de 10 jogadores (5 em campo e 5 suplentes) que têm como objetivo passar a bola por dentro de um cesto e evitar que a bola entre no seu cesto colocado nas extremidades da quadra, seja num ginásio ou ao ar livre. Os aros que formam os cestos são colocados a uma altura de 3 metros e 5 centímetros. Os jogadores podem caminhar no campo desde que driblem (batam a bola contra o chão) a cada passo dado. Também é possível executar um passe, ou seja,passar a bola em direção a um companheiro de equipe.', 4, '-', 'REGRAS Equipe - Existem duas equipes que são compostas por 5 jogadores cada (em jogo), mais 7 reservas. • Início do jogo – O Jogo começa com o lançamento da bola ao ar, pelo árbitro, entre dois jogadores adversários no círculo central e esta só pode ser tocada quando atingir o ponto mais alto. A equipe que não ganhou a posse de bola fica com a seta a seu favor. • Duração do jogo – Quatro períodos de 10 minutos de tempo útil cada (Na NBA, são 12 minutos), com um intervalo de meio tempo entre o segundo e o terceiro período com uma duração de 15 minutos, e com intervalos de dois minutos entre o primeiro e o segundo período e entre o terceiro e o quarto período. O cronómetro só avança quando a bola se encontra em jogo, isto é, sempre que o árbitro interrompe o jogo, o tempo é parado de imediato. • Reposição da bola em jogo - Depois da marcação de uma falta, o jogo recomeça por um lançamento fora das linhas laterais, excepto no caso de lances livres. Após a marcação de ponto, o jogo prossegue com um passe realizado atrás da linha do campo da equipe que defende. • Como jogar a bola - A bola é sempre jogada com as mãos. Não é permitido andar com a bola nas mãos ou provocar o contato da bola com os pés ou pernas. Também não é permitido driblar com as duas mãos ao mesmo tempo. • Pontuação - Um cesto é válido quando a bola entra pelo aro, por cima. Um cesto de campo vale 2 pontos, a não ser que tenha sido conseguido para além da linha dos 3 pontos, situada a 6,25 m (valendo, portanto, 3 pontos); um cesto de lance livre vale 1 ponto. • Empate – Os jogos não podem terminar empatados. O desempate processa-se através de períodos suplementares de 5 minutos. Exceptuando torneios cujo regulamento obrigue a mais que uma mão, todos os clubes de possíveis torneios devem concordar previamente com o regulamento. Assim como jogos particulares, após o término do tempo regulamentar se ambas as equipes concordarem podem dar a partida por terminada. • Resultado – O jogo é ganho pela equipe que marcar maior número de pontos no tempo regulamentar. • Lançamento livre – Na execução, os vários jogadores, ocupam os respectivos espaços ao longo da linha de marcação, não podem deixar os seus lugares até que a bola saia das mãos do lancador do lance livre (A6); não podem tocar a bola na sua trajectória para o cesto, até que esta toque no aro. • Penalizações de faltas pessoais – Se a falta for cometida sobre um jogador que não está em acto de lançamento, a falta será cobrada por forma de uma reposição de bola lateral, desde que a equipa(e) não tenha cometido mais do que 4 (quatro) faltas coletivas durante o período, caso contrário é concedido ao jogador que sofreu a falta o direito a dois lances livres. Se a falta for cometida sobre um jogador no acto de lançamento, o cesto conta e deve, ainda, ser concedido um lance livre. No caso do lançamento não tiver resultado cesto, o lançador irá executar o(s) lance(s) livres correspondentes às penalidades (2 ou 3 lances livres, conforme se trate de uma tentativa de lançamento de 2 ou 3 pontos). • Regra dos 5 segundos - Um jogador que está sendo marcado não pode ter a bola em sua posse (sem driblar) por mais de 5 segundos. • Regra dos 3 segundos - Um jogador não pode permanecer mais de 3 segundos dentro da área restritiva do adversário, enquanto a sua equipe esteja na posse da bola. • Regra dos 8 segundos - Quando uma equipe ganha a posse da bola na sua zona de defesa, deve, dentro de 8 segundos, fazer com que a bola chegue à zona de ataque. • Regra dos 24 segundos - Quando uma equipe está de posse da bola, dispõe de 24 segundos para a lançar ao cesto do adversário. • Bola presa – Considera-se bola presa quando dois ou mais jogadores (um de cada equipa pelo menos) tiverem uma ou ambas as mãos sobre a bola, ficando esta presa. A posse de bola será da equipe que tiver a seta a seu favor. • Transição de campo – Um jogador cuja equipe está na posse de bola, na sua zona de ataque, não pode provocar a ida da bola para a sua zona de defesa (retorno). • Dribles - Quando se dribla pode-se executar o n.o de passos que pretender. O jogador não pode bater a bola com as duas mãos simultaneamente, nem efectuar dois dribles consecutivos (jogar a bola, agarrá-la com as duas mãos e voltar a batê-la).  • Passos – O jogador não pode executar mais de dois passos com a bola nas mãos. • Faltas pessoais – É uma falta que envolve contacto com o adversário, e que consiste nos seguintes parâmetros: Obstrução, Carregar, Marcar pela retaguarda, Deter, Segurar, Uso ilegal das mãos, Empurrar. • Falta antidesportiva – Falta pessoal que, no entender do árbitro, foi cometida intencionalmente, com objectivo de prejudicar a equipa adversária. • Falta técnica – Falta cometida por um jogador sem envolver contacto pessoal com o adversário, como, por exemplo, contestação das decisões do árbitro, usando gestos, atitudes ou vocabulário ofensivo, ou mesmo quando não levantar imediatamente o braço quando solicitado pelo árbitro, após lhe ser assinalada uma falta. • Falta da equipe – Se uma equipa cometer um total de quatro faltas, para todas as outras faltas pessoais sofrerá a penalização de dois lançamentos livres. • Número de faltas – Um jogador que cometer cinco faltas está desqualificado da partida. • Altura do aro - A altura do aro até o solo é de 3,05 metros.', '../../assets/images/09112018050954fundamentos-do-basquete-01.jpg'),
('Futsal', 'Futebol de salão (também referido pelo acrônimo futsal) é o futebol adaptado para prática em uma quadra esportiva por times de 5 jogadores. As equipes, tal como no futebol, têm como objetivo colocar a bola na meta adversária, definida por dois postes verticais limitados pela altura por uma trave horizontal. Quando tal objetivo é alcançado, diz-se que um gol foi marcado, e um ponto é adicionado à equipe que o atingiu. O goleiro, último jogador responsável por evitar o gol, é o único autorizado a segurar a bola com as mãos. A partida é ganha pela equipe que marcar o maior número de gols em 40 minutos divididos em dois tempos.  Devido às proporções da área de jogo, o menor número de jogadores e a facilidade em que se pode jogar uma partida, o futsal já é considerado por muitos como o esporte mais praticado do Brasil, superando o futebol que ainda assim é o mais popular. Desde a sua criação até à atualidade existiram diversas variantes da modalidade assim como diversas designações, cujas r', 5, '-', '1 - Quadra de Jogo Dimensões da Quadra Um retângulo de 25 à 42 metros de comprimento e 16 à 25 metros de largura; Nos jogos nacionais das categorias adultas e Sub-20, a quadra deverá ter no mínimo 38 metros de comprimento por 18 de largura; Nas partidas internacionais o mínimo são 20 metros de largura e máximo 25 metros de largura. E deve ter no mínimo 38 metros de comprimento e máximo de 42 metros. Metas: Os chamados “gols” ficam localizados sobre a linha de meta com altura de 2 metros e 3 metros de largura. É obrigatório o uso de uma rede presa às traves e ao solo. Essa rede deve ser de material resistente (para não furar durante o jogo) e com malhas pequenas (para impedir que a bola passe por ela). Os postes e travessões podem ser feitos com plástico, madeira e ferro e pintados em cores diferentes da quadra de jogo.  Marcação da Quadra As linhas demarcatórias devem ser visíveis e com 8 centímetros de largura, pertencendo as zonas que demarcam. Existem várias marcações numa quadra de futsal.  As linhas limítrofes de maior comprimento são chamadas de linhas laterais e as de menor de linhas de meta; Uma linha deve passar pelo centro da quadra e ter um pequeno círculo no meio da quadra de 10 centímetros (onde a bola é colocada para que se dê inicio ao jogo); Outro círculo também é marcado no centro da quadra, esse maior que o anterior, com 3 metros de diâmetro; Nos quatro cantos da quadra, no encontro entre linhas laterais e de meta serão demarcados 1⁄4 de círculo com 25 centímetros de raio, local onde serão cobrados os arremessos de canto; As linhas demarcatórias fazem parte da quadra do jogo. Área de Substituição  É uma área por onde os jogadores substituídos devem sair da quadra e os substitutos entram no jogo. É um retângulo que fica à 5 metros de comprimento da linha divisória do meio da quadra e possui 5 metros de comprimento e 80 centímetros de largura, sendo que 40 cm são dentro da quadra e 40 fora. São duas áreas de substituições: uma para cada time, estando na frente do banco de reservas do mesmo.  Área Penal É a área em que o goleiro pode defender com as mãos. É uma em cada extremidade da quadra e fica na frente dos gols. É um semicírculo de raio de 6 metros, tendo seus limites na linha de fundo. É diferente da área da cobrança da penalidade máxima porque o ponto de penalidade máxima fica, também à 6 metros da linha de fundo, mas na posição frontal ao gol, enquanto essa área é marcada por um semicírculo.  Tiro de Canto A marcação de quadra dessa penalidade (saída de bola sendo que o último toque na bola tenha sido do time que esteja defendendo a meta de tal linha) está nos cantos da quadra. É marcada por 1⁄4 de círculo (90 graus), tendo um diâmetro de 25 cm (o centro desse 1⁄4 de círculo é o vértice da quadra).  Tiro Livre Sem Barreira É uma penalidade, sem que haja jogadores do outro time, exceto o goleiro, da bola até a meta adversária. A marcação para a cobrança dessa penalidade é de 10 metros do ponto central da meta. Outra marcação referente a essa penalidade é uma linha traçada 5 metros depois da linha de fundo que corresponde ao local onde o goleiro pode se adiantar nessas cobranças de tiro livre sem barreira.  2 - Bola de Futsal A bola deve ser esférica, feita de couro macio ou outro material previamente aprovado; A circunferência da bola tem o mínimo de 62 centímetros e máximo 64 centímetros nas categorias adultas, Sub-20, Sub-17 e Sub-15; O peso não pode ter menos de 400 gramas e ultrapassar 440 gramas. 3 - Número de Jogadores Um jogo possui duas equipes com 5 jogadores cada, sendo que um deles é o goleiro; Se uma das equipes ficar com menos de três jogadores, a partida deverá ser cancelada; Uma equipe pode ter no máximo 9 jogadores reservas; As substituições podem ser feitas em qualquer momento do jogo e não possuem uma quantidade específica.  4 - Equipamentos dos Jogadores Desenho de Jogador Atuando♦ O jogador não pode usar nenhum objeto considerado perigoso pelo árbitro. Exemplo: pulseiras, colares, anéis, alianças e brincos; Os jogadores devem usar: camisa de manga curta ou comprida, calção curto, caneleiras, tênis feitos de lona, pelica ou couro macio, meias de cano longo e caneleiras; Na entrada das equipes, os candidatos devem ficar com a camisa dentro dos calções; O uniforme do goleiro deve ser em uma cor diferente dos outros;  5 - Árbitro Principal e Auxiliar O jogo terá um árbitro auxiliar e um árbitro principal.  6 - Cronometrista e Anotador Eles trabalham em uma mesa que fica fora da quadra. O cronometrista acompanha e controla o tempo de jogo. Já o anotador trabalha examinando as fichas de identificação dos jogadores e comissão, registra as faltas cometidas pelas equipes, controla infrações, anota na súmula as ocorrências do jogo, etc.  7 - Duração da Partida Uma partida oficial de futsal tem duração de 40 minutos. São dois tempos de 20 minutos e 10 minutos para descanso (intervalo). O tempo de jogo é marcado com um cronômetro e isso deixa a partida mais dinâmica. As punições possuem algumas semelhanças com o futebol de campo, pelo menos no quesito dos cartões. Assim como no futebol, o futsal tem o cartão amarelo (para a advertir do jogador) e o cartão vermelho para a expulsão. O cartão vermelho causa a suspensão automática do jogador expulso para o próximo jogo. O mesmo acontece com o integrante do time que receber três cartões amarelos em partidas diferentes.  8 - Bola de Saída O árbitro principal será o responsável por fazer um sorteio, a fim de decidir, no início da partida, a escolha de lado ou saída da bola. A equipe vencedora começará na meia quadra, onde iniciará jogando. Já a equipe perdedora terá o direito à bola de saída do jogo. Caso ocorra tempo suplementar, deve-se adotar o mesmo método.  9 - Bola em Jogo e Fora de Jogo A bola estará fora do jogo quando atravessar completamente as linhas laterais ou de meta, quer seja pelo solo ou pelo alto; quando a partida for interrompida pelo árbitro; e quando a bola bater no teto (partidas em quadra coberta) ou em qualquer equipamento esportivo inseridos nos limites da quadra. A bola estará em jogo em todas as demais ocasiões, incluindo quando o tocar nos árbitros dentro da quadra de jogo; quando não for tomada nenhuma decisão com relação a infrações das regras do jogo; e quando bater nas traves ou travessão e permanecer dentro da quadra.  10 - Contagem de Gols Os gols serão válidos quando ultrapassarem completamente a linha de meta entre os postes e sob o travessão, desde que ela não tenha sido carregada, arremessada ou impulsionada de forma intencional (mão ou braço de jogador atacante ou goleiro adversário). A equipe vencedora será aquela que tiver maior número de gols. Caso haja o mesmo número de gols ou nenhuma equipe tiver marcado será considerado empate. Além dessas especificações, existem outras relacionadas que impedem ou permitem a marcação do gol. 11 - Impedimento Não existe a regra de impedimento no futsal. 12 - Faltas e Incorreções  Para que uma atitude seja considerada falta, deve-se considerar os seguintes aspectos: Ter sido cometida por um jogador em quadra ou reserva; Precisa ter sido realizada na superfície do jogo e enquanto a bola estiver em jogo. As faltas são penalizadas com o Tiro Livre Direto e Tiro Livre Indireto:  Tiro Livre Direto  O tiro livre são os chutes cobrados após a paralisação do jogo depois de alguma infração cometida na partida. O tiro livro direto é concedido a uma equipe quando o jogador adversário apresentar as seguintes atitudes:  Dar pontapé, derrubar o jogador do outro time; Bater, cuspir, tentar segurar o adversário; Empurrar o adversário; Oferecer perigo a outro jogador de maneira imprudente; Praticar uma jogada que atinja de forma perigosa qualquer jogador, etc. A falta é anotada para a equipe e caso ela ocorra na área penal de quem cometeu, a equipe adversária executará uma cobrança de uma penalidade máxima.  Tiro Livre Indireto  Será cobrado quando o jogador adversário apresentar as seguintes atitudes:  Ficar com a bola por mais de 4 segundos na área penal; Se o goleiro tocar ou controlar a bola que venha de um tiro lateral ou de canto cobrado por um companheiro; Tentar retirar a bola das mãos do goleiro; Prender a bola;  Tentar enganar o adversário se passado por um companheiro de time; Tentar retardar o tempo da partida; Impedir que o goleiro lance a bola com as mãos, etc.', '../../assets/images/20112018114159futsal.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ligas`
--

CREATE TABLE `ligas` (
  `id_liga` int(11) NOT NULL,
  `historia` mediumtext CHARACTER SET utf8 NOT NULL,
  `fundacao` varchar(10000) CHARACTER SET utf8 NOT NULL,
  `regulamento` mediumtext CHARACTER SET utf8,
  `pais` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `esporte_id_esporte` int(10) DEFAULT NULL,
  `nome_liga` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `icon_liga` varchar(10000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ligas`
--

INSERT INTO `ligas` (`id_liga`, `historia`, `fundacao`, `regulamento`, `pais`, `esporte_id_esporte`, `nome_liga`, `icon_liga`) VALUES
(1, 'A história da Copa do Mundo de Futebol da FIFA se iniciou em 1928, durante um congresso da entidade, quando Jules Rimet conseguiu a aprovação para criar um torneio internacional. A primeira competição ocorreu em 1930, tendo a participação de 13 equipes convidadas, tendo o Uruguai como país-sede e como campeão.', '1930', 'A Copa do Mundo é disputada atualmente por 32 times e dividida em 8 grupos com 4 seleções cada, sendo jogo único, onde todas as equipes do grupo se enfrentam e os 2 melhores colocados se classificam para a fase de mata-mata.', '-', 1, 'Copa do Mundo', '../../assets/images/copa.jpg'),
(6, 'Ao longo da história, várias tentativas foram criadas para tentar iniciar um torneio que reunisse os melhores clubes europeus. O primeiro torneio pan-europeu foi o Challenge Cup , uma competição entre clubes no Império Austro-Húngaro. A Mitropa Cup, uma competição inspirada na Copa Challenge, foi criada em 1927, uma ideia do austríaco Hugo Meisl, e foi disputada entre clubes da Europa Central. Em 1930, a Coupe des Nations, a primeira tentativa de criar uma copa para clubes campeões nacionais da Europa, foi jogada e organizada pelo clube suíço Servette. Realizada em Genebra, reuniu dez campeões de todo o continente. O torneio foi conquistado pela ?jpest da Hungria. As nações latino-européias se uniram para formar a Copa Latina em 1949. Até que finalmente em 1955 foi criado uma nova competição, que viria a ser a principal competição de clubes da Europa. A Taça dos Clubes Campeões Europeus (português europeu) ou Copa dos Clubes Campeões Europeus (português brasileiro) foi inspirada no Cam', '1955', 'O torneio começa com uma fase de grupos de 32 equipes, divididas em oito grupos. Os grupos s?o definidos atrav?s de sorteio, sendo que equipes do mesmo pa?s n?o podem cair em grupos iguais. Cada equipe se encontra com os outros em sua casa e fora em um formato de ida e volta. A equipe vencedora e segundo colocado de cada grupo passam para a pr?xima rodada. A equipe que fica na terceira coloca??o entra na Liga Europa da UEFA.  Para este est?gio, a equipe vencedora de um grupo joga contra os vice-campe?es de outro grupo, e os times da mesma associa??o podem se enfrentar um contra o outro. A partir das quartas de final, o sorteio ? inteiramente aleat?rio, sem prote??o de associa??o. O torneio usa a regra do gol fora de casa: se a pontua??o agregada dos dois jogos estiver empatada, ent?o a equipe que marcou mais golos no est?dio do seu oponente avan?a.  A fase de grupos ocorre de setembro a dezembro, enquanto o mata-mata come?a em fevereiro. O sistema de mata-mata tamb?m ? de ida e volta, ', 'Europa', 1, 'Champions League', '../../assets/images/champions-league.jpg'),
(7, 'Superliga Brasileira de Voleibol Masculino ? o \"nome-fantasia\" da principal divis?o do Campeonato Brasileiro de Voleibol. A denomina??o \"S?rie A\" passou a ser utilizada a partir da temporada 2011/2012, na qual foi criada a S?rie B. Todos os campe?es anteriores da Superliga s?o reconhecidos como campe?es brasileiros de voleibol, assim como todos os campe?es da S?rie A desta temporada em diante. O torneio ? organizado anualmente pela Confedera??o Brasileira de Voleibol (CBV) e d? acesso ao seu campe?o ao Campeonato Sul-Americano de Clubes. Os dois ?ltimos colocados s?o rebaixados ? S?rie B na temporada seguinte.', '2011', 'A forma de disputa tem sido com uma fase classificat?ria em pontos corridos, turno e returno, quartas-de-final definidas em s?rie melhor-de-tr?s, semifinais em melhor-de-cinco e final em jogo ?nico.  O campe?o ganha o direito de disputar o Campeonato Sul-Americano de Clubes.', 'Brasil', 3, 'Superliga Masculina', '../../assets/images/superliga-de-volei-sky.jpg'),
(8, 'A National Basketball Association é a principal liga de basquetebol profissional da América do Norte. Com 30\r\nfranquias sendo membros da mesma (29 nos Estados Unidos e 1 no Canadá), a NBA também é considerada a principal\r\nliga de basquete do mundo. É um membro ativo da USA Basketball (USAB), que é reconhecida pela FIBA (a Federação\r\nInternacional de Basquetebol) como a entidade máxima e organizadora do basquetebol nos Estados Unidos. A NBA é\r\numa das 4 \'major leagues\' de esporte profissional na América do Norte. Os jogadores da NBA são os mais bem pagos\r\nesportistas do mundo, por salário médio anual.', 'A liga foi fundada na cidade de Nova Iorque em 6 de Junho de 1946, como a Basketball Association of America (BAA).A liga adotou o nome de National Basketball Association em 1949 quando se fundiu com a rival National Basketball League (NBL). A liga tem diversos escritórios ao redor do mundo, além de vários dos próprios clubes fora da sede principal na Olympic Tower localizada na Quinta Avenida 645. Os estúdios da NBA Entertainment e da NBA TV são localizados em Secaucus, New Jersey.', 'A NBA tem 30 equipes, divididas em 2 Conferências: A Leste e a Oeste. A Conferência Leste possui 15 equipes, divididas em 3 divisões: do Atlântico central e a sudeste. A Conferência do Oeste possui 15 equipes, divididas também em 3 divisões: do Pacífico, sudoeste e a noroeste. Todas as equipes jogam 2 vezes contra os times da outra Conferência e jogam 3 ou 4 vezes contra os times da mesma Conferência. Após os 82 jogos de cada equipe, os 8 melhores times de cada Conferência jogam nos Playoffs. Nos Playoffs, os jogos são sempre dentro das Conferências, respeitando a seguinte classificação: 1º x 8º, 2º x 7º, 3º x 6º e 4º x 5º. As tres rodada dos Playoffs é sempre disputada em melhor de sete partidas. Nos Playoffs, os times das 2 conferências apenas se encontram na grande final. É o jogo do Campeão do Leste contra o Campeão do Oeste.', 'Estados Unidos e Canadá', 4, 'NBA', '../../assets/images/13112018120358social_share_default.png'),
(9, 'A Liga Nacional de Futsal é o campeonato brasileiro da modalidade de futsal. Foi criada em 1996 pela Confederação Brasileira de Futsal com o propósito de profissionalizar o calendário das equipes do país. Para participar do campeonato, é preciso comprar uma franquia ou se associar a uma franquia já existente.O campeão de cada edição além de receber uma premiação em dinheiro e um troféu, ganha o direito de  representar o Brasil em campeonatos internacionais. A inspiração veio do modelo do basquete norte- americano, hoje um evento de sucesso reconhecido no mundo todo pela organização, estrutura e qualidade  técnica dos participantes. Com essa filosofia de sempre levar o melhor espetáculo ao público, a Confederação Brasileira de Futebol de Salão (CBFS) deu início no dia 27 de abril de 1996 à Liga Futsal, em parceria com as principais empresas de material esportivo do mundo, patrocinadores de renome nacional, clubes tradicionais e a televisão. No dia 11 de Julho de 2014, o presidente da CBFS, Renan Pimentel, convocou todos os proprietários de Franquia ou Representantes devidamente Credenciados para uma Assembleia na qual foi aprovada a Fundação da Liga Nacional de Futsal (LNF), que hoje é a empresa que controla a estrutura e organiza o campeonato, um dos mais disputados do mundo.', '27 de abril de 1996', 'Equipes jogam em fase de pontos corridos e após isso se inicia o mata-mata', 'Brasil', 5, 'Liga Nacional de Futsal', '../../assets/images/20112018114506logo_LNF_1.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(10) NOT NULL,
  `nome_tipo_usuario` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nome_tipo_usuario`) VALUES
(1, 'comum'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(40) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `nome_usuario` varchar(64) NOT NULL,
  `tipo_usuario_id_tipo_usuario` int(10) NOT NULL,
  `verificado` int(1) DEFAULT NULL,
  `id_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`email`, `senha`, `id_usuario`, `nome_usuario`, `tipo_usuario_id_tipo_usuario`, `verificado`, `id_pass`) VALUES
('erkmann08@gmail.com', '$2y$10$kX4JZ9fXSpK5bWpmsCa1kuiOpbcr.8l3DmZxGYaizxKnL3e5SpW1q', 146, 'GME', 2, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentar_craques`
--
ALTER TABLE `comentar_craques`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_usuario_has_craques_craques1_idx` (`id_craques`),
  ADD KEY `fk_usuario_has_craques_usuario1_idx` (`id_usuario`);

--
-- Indexes for table `comentar_equipes`
--
ALTER TABLE `comentar_equipes`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_equipes_has_usuario_usuario1_idx` (`id_usuario`),
  ADD KEY `fk_equipes_has_usuario_equipes1_idx` (`id_equipe`);

--
-- Indexes for table `comentar_esportes`
--
ALTER TABLE `comentar_esportes`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_esportes_has_usuario_usuario1_idx` (`id_usuario`),
  ADD KEY `fk_esportes_has_usuario_esportes1_idx` (`id_esporte`);

--
-- Indexes for table `comentar_liga`
--
ALTER TABLE `comentar_liga`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_ligas_has_usuario_usuario1_idx` (`id_usuario`),
  ADD KEY `fk_ligas_has_usuario_ligas1_idx` (`id_liga`);

--
-- Indexes for table `craques`
--
ALTER TABLE `craques`
  ADD PRIMARY KEY (`id_craques`);

--
-- Indexes for table `curtir_craques`
--
ALTER TABLE `curtir_craques`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_craques` (`id_craques`);

--
-- Indexes for table `curtir_equipe`
--
ALTER TABLE `curtir_equipe`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_equipe` (`id_equipe`);

--
-- Indexes for table `curtir_esportes`
--
ALTER TABLE `curtir_esportes`
  ADD KEY `id_esporte` (`id_esporte`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `curtir_ligas`
--
ALTER TABLE `curtir_ligas`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `fk_curtir_ligas_ligas2_idx` (`id_liga`);

--
-- Indexes for table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Indexes for table `equipes_craques`
--
ALTER TABLE `equipes_craques`
  ADD PRIMARY KEY (`id_associativa`),
  ADD KEY `equipes_craques_ibfk_1` (`id_equipe`),
  ADD KEY `equipes_craques_ibfk_2` (`id_craques`);

--
-- Indexes for table `equipes_ligas`
--
ALTER TABLE `equipes_ligas`
  ADD PRIMARY KEY (`id_associativa`),
  ADD KEY `id_liga` (`id_liga`),
  ADD KEY `id_equipe` (`id_equipe`) USING BTREE;

--
-- Indexes for table `esportes`
--
ALTER TABLE `esportes`
  ADD PRIMARY KEY (`id_esporte`);

--
-- Indexes for table `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`id_liga`),
  ADD KEY `id_esporte` (`esporte_id_esporte`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`tipo_usuario_id_tipo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentar_craques`
--
ALTER TABLE `comentar_craques`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comentar_equipes`
--
ALTER TABLE `comentar_equipes`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comentar_esportes`
--
ALTER TABLE `comentar_esportes`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `comentar_liga`
--
ALTER TABLE `comentar_liga`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `craques`
--
ALTER TABLE `craques`
  MODIFY `id_craques` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id_equipe` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `equipes_craques`
--
ALTER TABLE `equipes_craques`
  MODIFY `id_associativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `equipes_ligas`
--
ALTER TABLE `equipes_ligas`
  MODIFY `id_associativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `esportes`
--
ALTER TABLE `esportes`
  MODIFY `id_esporte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id_liga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentar_craques`
--
ALTER TABLE `comentar_craques`
  ADD CONSTRAINT `fk_usuario_has_craques_craques1` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_craques_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comentar_equipes`
--
ALTER TABLE `comentar_equipes`
  ADD CONSTRAINT `fk_equipes_has_usuario_equipes1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipes_has_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comentar_esportes`
--
ALTER TABLE `comentar_esportes`
  ADD CONSTRAINT `fk_esportes_has_usuario_esportes1` FOREIGN KEY (`id_esporte`) REFERENCES `esportes` (`id_esporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_esportes_has_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comentar_liga`
--
ALTER TABLE `comentar_liga`
  ADD CONSTRAINT `fk_ligas_has_usuario_ligas1` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id_liga`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ligas_has_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `curtir_craques`
--
ALTER TABLE `curtir_craques`
  ADD CONSTRAINT `curtir_craques_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `curtir_craques_ibfk_2` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`),
  ADD CONSTRAINT `curtir_craques_ibfk_3` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`);

--
-- Limitadores para a tabela `curtir_equipe`
--
ALTER TABLE `curtir_equipe`
  ADD CONSTRAINT `curtir_equipe_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `curtir_equipe_ibfk_2` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`),
  ADD CONSTRAINT `curtir_equipe_ibfk_3` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`);

--
-- Limitadores para a tabela `curtir_esportes`
--
ALTER TABLE `curtir_esportes`
  ADD CONSTRAINT `curtir_esportes_ibfk_1` FOREIGN KEY (`id_esporte`) REFERENCES `esportes` (`id_esporte`),
  ADD CONSTRAINT `curtir_esportes_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `curtir_ligas`
--
ALTER TABLE `curtir_ligas`
  ADD CONSTRAINT `curtir_ligas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_curtir_ligas_ligas2` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id_liga`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `equipes_craques`
--
ALTER TABLE `equipes_craques`
  ADD CONSTRAINT `equipes_craques_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`),
  ADD CONSTRAINT `equipes_craques_ibfk_2` FOREIGN KEY (`id_craques`) REFERENCES `craques` (`id_craques`);

--
-- Limitadores para a tabela `equipes_ligas`
--
ALTER TABLE `equipes_ligas`
  ADD CONSTRAINT `equipes_ligas_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`),
  ADD CONSTRAINT `equipes_ligas_ibfk_2` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id_liga`);

--
-- Limitadores para a tabela `ligas`
--
ALTER TABLE `ligas`
  ADD CONSTRAINT `ligas_ibfk_1` FOREIGN KEY (`esporte_id_esporte`) REFERENCES `esportes` (`id_esporte`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
