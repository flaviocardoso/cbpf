-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 17-Jul-2018 às 07:35
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admins`
--
CREATE DATABASE IF NOT EXISTS `admins` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `admins`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `idad` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `telefone` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`idad`, `user`, `nome`, `email`, `telefone`) VALUES
(1, 'flavioc41', 'FLAVIO OTAVIO CARDOSO COELHO', 'flavioc41@gmail.com', '21988684997');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idad`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `coords`
--
CREATE DATABASE IF NOT EXISTS `coords` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `coords`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coord`
--

CREATE TABLE `coord` (
  `idco` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sala` varchar(10) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `coord` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coord`
--
ALTER TABLE `coord`
  ADD PRIMARY KEY (`idco`);
--
-- Database: `link`
--
CREATE DATABASE IF NOT EXISTS `link` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `link`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `idarq` int(11) NOT NULL,
  `idos` int(11) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orderservice`
--

CREATE TABLE `orderservice` (
  `idos` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `nos` varchar(120) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `coord` varchar(10) NOT NULL,
  `ala` varchar(10) NOT NULL,
  `sala` varchar(10) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `setor` varchar(10) NOT NULL,
  `arq_name` varchar(200) DEFAULT NULL,
  `arq` varchar(500) DEFAULT NULL,
  `arq_type` varchar(200) DEFAULT NULL,
  `datahora` datetime NOT NULL,
  `descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orderservice`
--

INSERT INTO `orderservice` (`idos`, `user`, `nos`, `nome`, `email`, `coord`, `ala`, `sala`, `telefone`, `setor`, `arq_name`, `arq`, `arq_type`, `datahora`, `descr`) VALUES
(19, 'flavioc41', 'cat/20180627195109', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, NULL, NULL, '2018-06-27 19:51:09', 'serviÃ§o 1'),
(20, 'flavioc41', 'cat/20180627195931', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, NULL, NULL, '2018-06-27 19:59:31', 'serviÃ§o 2'),
(21, 'teste', 'cat/20180627213233', 'Marco Aurerio', 'aurerios@hotmail.com', 'cat', 'c', '321', '44646487987', 'elet', NULL, NULL, NULL, '2018-06-27 21:32:33', 'ordem de serviÃ§o 1'),
(22, 'teste', 'cat/20180627213804', 'Marco Aurerio', 'aurerios@hotmail.com', 'cat', 'c', '321', '44646487987', 'elet', NULL, NULL, NULL, '2018-06-27 21:38:04', 'ordem de serviÃ§o 2'),
(23, 'teste1', 'cat/20180628153633', 'Costa Barros', 'costa_0a@hotmail.com', 'cat', 'c', '322', '6464774465', 'elet', NULL, NULL, NULL, '2018-06-28 15:36:33', 'ordem de serviÃ§o 233'),
(24, 'flavioc41', 'cat/20180705155008', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, NULL, NULL, '2018-07-05 15:50:08', 'teste sem arq!'),
(25, 'flavioc41', 'cat/20180705155332', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 15:53:32', 'teste sem arq!'),
(26, 'flavioc41', 'cat/20180705155537', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 15:55:37', 'teste arq in'),
(27, 'flavioc41', 'cat/20180705162440', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 16:24:40', 'teste de arq233!'),
(28, 'flavioc41', 'cat/20180705163035', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 16:30:35', 'tetsede de arqu7277!'),
(29, 'flavioc41', 'cat/20180705163119', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 16:31:19', 'teste e3 aqr 5266!'),
(30, 'flavioc41', 'cat/20180705163232', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 16:32:32', 'teste de arqhgfusgu!'),
(31, 'flavioc41', 'cat/20180705163842', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 16:38:42', 'teste arquivo apprer'),
(32, 'flavioc41', 'cat/20180705164810', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 16:48:10', 'teste arquivo 12312321'),
(33, 'flavioc41', 'cat/20180705165250', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 16:52:50', 'teste de arq6636'),
(34, 'flavioc41', 'cat/20180705165835', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 16:58:35', 'testte arqyu 26172'),
(35, 'flavioc41', 'cat/20180705172009', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', '', NULL, '', NULL, '2018-07-05 17:20:09', ''),
(36, 'flavioc41', 'cat/20180705174747', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/05/17/47/47/resumo_fundamentos_de_rede.pdf', NULL, '2018-07-05 17:47:47', ''),
(37, 'flavioc41', 'cat/20180705174946', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/05/17/49/46/resumo_fundamentos_de_rede.pdf', NULL, '2018-07-05 17:49:46', ''),
(38, 'flavioc41', 'cat/20180705175923', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 17:59:23', ''),
(39, 'flavioc41', 'cat/20180705180229', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 18:02:29', ''),
(40, 'flavioc41', 'cat/20180705180528', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 18:05:28', ''),
(41, 'flavioc41', 'cat/20180705180746', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 18:07:46', ''),
(42, 'flavioc41', 'cat/20180705181323', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-05 18:13:23', ''),
(43, 'flavioc41', 'cat/20180706184922', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'marc', NULL, '', NULL, '2018-07-06 18:49:22', 'test de arquivos 3712'),
(44, 'flavioc41', 'cat/20180706185458', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-06 18:54:58', 'teste de arquivos 2323'),
(45, 'flavioc41', 'cat/20180706185846', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/06/18/58/46/resumo_fundamentos_de_rede.pdf', NULL, '2018-07-06 18:58:46', 'teste de arquivos 32663'),
(46, 'flavioc41', 'cat/20180706190418', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/06/19/04/18/resumo_fundamentos_de_rede.pdf', NULL, '2018-07-06 19:04:18', 'teste de arquivo 3424'),
(47, 'flavioc41', 'cat/20180706204546', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/06/20/45/46/resumo_fundamentos_de_rede.pdf', NULL, '2018-07-06 20:45:46', 'teste de arquivo e teste de prever recarregamento!'),
(48, 'flavioc41', 'cat/20180706204600', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/06/20/46/00/resumo_fundamentos_de_rede.pdf', NULL, '2018-07-06 20:46:00', 'teste de arquivo e teste de prever recarregamento!'),
(49, 'flavioc41', 'cat/20180706231734', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/06/23/17/34/atom:--tree-.txt', NULL, '2018-07-06 23:17:34', 'teste de arquivo e formu'),
(50, 'flavioc41', 'cat/20180706231753', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/06/23/17/53/atom:--tree-.txt', NULL, '2018-07-06 23:17:53', 'teste de arquivo e formu'),
(51, 'flavioc41', 'cat/20180706232152', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/06/23/21/52/atom:--tree-.txt', NULL, '2018-07-06 23:21:52', 'teste de formu 3423'),
(52, 'flavioc41', 'cat/20180706232225', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/06/23/22/25/atom:--tree-.txt', NULL, '2018-07-06 23:22:25', 'teste de formu 3423'),
(53, 'flavioc41', 'cat/20180706234028', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-06 23:40:28', ''),
(54, 'flavioc41', 'cat/20180707004158', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/07/00/41/58/atom:--tree-.txt', NULL, '2018-07-07 00:41:58', 'teste teste arq reload'),
(55, 'flavioc41', 'cat/20180707004451', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-07 00:44:51', 'teste ded aqdqd'),
(56, 'flavioc41', 'cat/20180707004527', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/07/00/45/27/resumo_fundamentos_de_rede.pdf', NULL, '2018-07-07 00:45:27', 'teste de arquuru'),
(57, 'flavioc41', 'cat/20180707215346', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-07 21:53:46', ''),
(58, 'flavioc41', 'cat/20180707221354', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-07 22:13:54', 'fijk  ihi  ih irhi'),
(59, 'flavioc41', 'cat/20180708180952', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '', NULL, '2018-07-08 18:09:52', 'teste testte tettsgt'),
(60, 'flavioc41', 'cat/20180708181842', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', NULL, '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/08/18/18/42/atom:--tree-.txt', NULL, '2018-07-08 18:18:42', 'teste tetfs ggdghsg'),
(61, 'flavioc41', 'cat/20180708234642', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', 'resumo_fundamentos_de_rede.pdf', '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/08/23/46/42/resumo_fundamentos_de_rede.pdf', 'application/pdf', '2018-07-08 23:46:42', 'teste de arquivo nome type e link'),
(62, 'flavioc41', 'cat/20180709151510', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', 'resumo_fundamentos_de_rede.pdf', '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/09/15/15/10/resumo_fundamentos_de_rede.pdf', 'application/pdf', '2018-07-09 15:15:10', 'teste de arquivo pdf 7517532'),
(63, 'flavioc41', 'cat/20180710191446', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', 'resumo_fundamentos_de_rede.pdf', '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/10/19/14/46/resumo_fundamentos_de_rede.pdf', 'application/pdf', '2018-07-10 19:14:46', 'teste de email e arquivo 123'),
(64, 'flavioc41', 'cat/20180713155724', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', 'resumo_fundamentos_de_rede.pdf', '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/13/15/57/24/resumo_fundamentos_de_rede.pdf', 'application/pdf', '2018-07-13 15:57:24', 'teste de arquivo e email teste con 44343'),
(65, 'teste', 'cat/20180713163454', 'Marco Aurerio', 'aurerios@hotmail.com', 'cat', 'c', '321', '44646487987', 'meca', 'resumo_fundamentos_de_rede.pdf', '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/13/16/34/54/resumo_fundamentos_de_rede.pdf', 'application/pdf', '2018-07-13 16:34:54', 'teste de arquivo e email teste 86883'),
(66, 'flavioc41', 'cat/20180717012727', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'c', '123', '(021)39032065', 'meca', 'resumo_fundamentos_de_rede.docx', '/opt/lampp/htdocs/cbpf/conec/data/uploads/2018/07/17/01/27/27/resumo_fundamentos_de_rede.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2018-07-17 01:27:27', 'Ã‰ um fato conhecido de todos que um leitor se distrairÃ¡ com o conteÃºdo de texto legÃ­vel de uma pÃ¡gina quando estiver examinando sua diagramaÃ§Ã£o. A vantagem de usar Lorem Ipsum Ã© que ele tem uma distribuiÃ§Ã£o normal de letras, ao contrÃ¡rio de &quot;ConteÃºdo aqui, conteÃºdo aqui&quot;, fazendo com que ele tenha uma aparÃªncia similar a de um texto legÃ­vel.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `idtecn` int(11) NOT NULL,
  `idos` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `setor` varchar(10) DEFAULT NULL,
  `datahora` datetime DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `laudo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tecnico`
--

INSERT INTO `tecnico` (`idtecn`, `idos`, `nome`, `user`, `setor`, `datahora`, `status`, `laudo`) VALUES
(8, 19, NULL, NULL, 'meca', '2018-06-27 19:51:09', 'NOVA', NULL),
(9, 19, 'Marco Aurerio', 'teste', 'meca', '2018-06-27 19:55:21', 'ANDA', 'executar 1'),
(10, 19, 'Marco Aurerio', 'teste', 'meca', '2018-06-27 19:55:33', 'ANDA', 'executar 2'),
(11, 20, NULL, NULL, 'meca', '2018-06-27 19:59:31', 'NOVA', NULL),
(12, 21, NULL, NULL, 'elet', '2018-06-27 21:32:33', 'NOVA', NULL),
(13, 21, 'Flavio Cardoso', 'flavioc41', 'elet', '2018-06-27 21:33:53', 'ANDA', 'serviÃ§o 1'),
(14, 21, 'Flavio Cardoso', 'flavioc41', 'elet', '2018-06-27 21:34:05', 'ANDA', 'serviÃ§o 2'),
(15, 22, NULL, NULL, 'elet', '2018-06-27 21:38:04', 'NOVA', NULL),
(16, 22, 'Flavio Cardoso', 'flavioc41', 'elet', '2018-06-27 21:40:54', 'ANDA', 'serviÃ§o 1'),
(17, 22, 'Flavio Cardoso', 'flavioc41', 'elet', '2018-06-27 21:41:17', 'ANDA', 'serviÃ§o 2'),
(18, 23, NULL, NULL, 'elet', '2018-06-28 15:36:33', 'NOVA', NULL),
(19, 21, 'Kaio Olavo', 'teste2', 'elet', '2018-06-28 16:00:17', 'ANDA', 'serviÃ§o 3'),
(20, 29, NULL, NULL, 'meca', '2018-07-05 16:31:19', 'NOVA', NULL),
(21, 30, NULL, NULL, 'meca', '2018-07-05 16:32:32', 'NOVA', NULL),
(22, 31, NULL, NULL, 'meca', '2018-07-05 16:38:42', 'NOVA', NULL),
(23, 32, NULL, NULL, 'meca', '2018-07-05 16:48:10', 'NOVA', NULL),
(24, 33, NULL, NULL, 'meca', '2018-07-05 16:52:50', 'NOVA', NULL),
(25, 34, NULL, NULL, 'meca', '2018-07-05 16:58:35', 'NOVA', NULL),
(26, 35, NULL, NULL, '', '2018-07-05 17:20:09', 'NOVA', NULL),
(27, 36, NULL, NULL, 'meca', '2018-07-05 17:47:47', 'NOVA', NULL),
(28, 37, NULL, NULL, 'meca', '2018-07-05 17:49:46', 'NOVA', NULL),
(29, 38, NULL, NULL, 'meca', '2018-07-05 17:59:23', 'NOVA', NULL),
(30, 39, NULL, NULL, 'meca', '2018-07-05 18:02:29', 'NOVA', NULL),
(31, 40, NULL, NULL, 'meca', '2018-07-05 18:05:28', 'NOVA', NULL),
(32, 41, NULL, NULL, 'meca', '2018-07-05 18:07:46', 'NOVA', NULL),
(33, 42, NULL, NULL, 'meca', '2018-07-05 18:13:23', 'NOVA', NULL),
(34, 43, NULL, NULL, 'marc', '2018-07-06 18:49:22', 'NOVA', NULL),
(35, 44, NULL, NULL, 'meca', '2018-07-06 18:54:58', 'NOVA', NULL),
(36, 45, NULL, NULL, 'meca', '2018-07-06 18:58:46', 'NOVA', NULL),
(37, 46, NULL, NULL, 'meca', '2018-07-06 19:04:18', 'NOVA', NULL),
(38, 47, NULL, NULL, 'meca', '2018-07-06 20:45:46', 'NOVA', NULL),
(39, 48, NULL, NULL, 'meca', '2018-07-06 20:46:00', 'NOVA', NULL),
(40, 49, NULL, NULL, 'meca', '2018-07-06 23:17:34', 'NOVA', NULL),
(41, 50, NULL, NULL, 'meca', '2018-07-06 23:17:53', 'NOVA', NULL),
(42, 51, NULL, NULL, 'meca', '2018-07-06 23:21:52', 'NOVA', NULL),
(43, 52, NULL, NULL, 'meca', '2018-07-06 23:22:25', 'NOVA', NULL),
(44, 53, NULL, NULL, 'meca', '2018-07-06 23:40:28', 'NOVA', NULL),
(45, 54, NULL, NULL, 'meca', '2018-07-07 00:41:58', 'NOVA', NULL),
(46, 55, NULL, NULL, 'meca', '2018-07-07 00:44:51', 'NOVA', NULL),
(47, 56, NULL, NULL, 'meca', '2018-07-07 00:45:27', 'NOVA', NULL),
(48, 57, NULL, NULL, 'meca', '2018-07-07 21:53:46', 'NOVA', NULL),
(49, 58, NULL, NULL, 'meca', '2018-07-07 22:13:54', 'NOVA', NULL),
(50, 59, NULL, NULL, 'meca', '2018-07-08 18:09:52', 'NOVA', NULL),
(51, 60, NULL, NULL, 'meca', '2018-07-08 18:18:42', 'NOVA', NULL),
(52, 61, NULL, NULL, 'meca', '2018-07-08 23:46:42', 'NOVA', NULL),
(53, 62, NULL, NULL, 'meca', '2018-07-09 15:15:10', 'NOVA', NULL),
(54, 62, 'Flavio Cardoso', 'flavioc41', 'elet', '2018-07-10 18:03:21', 'ANDA', 'teste de envio ?'),
(55, 62, 'Flavio Cardoso', 'flavioc41', 'elet', '2018-07-10 18:05:38', 'ANDA', 'teste de envio ?'),
(56, 62, 'Flavio Cardoso', 'flavioc41', 'elet', '2018-07-10 18:26:53', 'ANDA', 'teste de envio ?'),
(57, 61, 'Marco Aurerio', 'teste', 'meca', '2018-07-10 18:31:19', 'ANDA', 'teste email laudo envio ?'),
(58, 61, 'Marco Aurerio', 'teste', 'meca', '2018-07-10 18:34:19', 'ANDA', 'teste email laudo envio?'),
(59, 63, NULL, NULL, 'meca', '2018-07-10 19:14:46', 'NOVA', NULL),
(60, 65, NULL, NULL, 'meca', NULL, 'NOVA', NULL),
(61, 66, NULL, NULL, 'meca', NULL, 'NOVA', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `user` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `setor` varchar(4) NOT NULL,
  `sala` varchar(10) DEFAULT NULL,
  `coord` varchar(10) DEFAULT NULL,
  `ala` varchar(10) DEFAULT NULL,
  `nivel` int(1) UNSIGNED NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `user`, `email`, `telefone`, `senha`, `setor`, `sala`, `coord`, `ala`, `nivel`, `ativo`, `cadastro`) VALUES
(4, 'Flavio Cardoso', 'flavioc41', 'flavioc41@gmail.com', '(021)39032065', '1234', 'elet', '123', 'cat', 'c', 1, 1, '2018-06-27 19:48:39'),
(5, 'Marco Aurerio', 'teste', 'aurerios@hotmail.com', '44646487987', '1234', 'meca', '321', 'cat', 'c', 3, 1, '2018-06-27 19:52:54'),
(6, 'Costa Barros', 'teste1', 'costa_0a@hotmail.com', '6464774465', '1234', 'meca', '322', 'cat', 'c', 3, 1, '2018-06-28 15:33:57'),
(7, 'Kaio Olavo', 'teste2', 'kaio_43@hotmail.com', '554464461131', '1234', 'elet', '323', 'cat', 'c', 3, 1, '2018-06-28 15:58:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`idarq`),
  ADD KEY `idos` (`idos`);

--
-- Indexes for table `orderservice`
--
ALTER TABLE `orderservice`
  ADD PRIMARY KEY (`idos`);

--
-- Indexes for table `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`idtecn`),
  ADD KEY `idos` (`idos`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `idarq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderservice`
--
ALTER TABLE `orderservice`
  MODIFY `idos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `idtecn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`idos`) REFERENCES `orderservice` (`idos`);

--
-- Limitadores para a tabela `tecnico`
--
ALTER TABLE `tecnico`
  ADD CONSTRAINT `tecnico_ibfk_1` FOREIGN KEY (`idos`) REFERENCES `orderservice` (`idos`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('link', 'arquivo', 'link'),
('link', 'tecnico', 'nome');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Extraindo dados da tabela `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'link', 'orderservice', '{\"sorted_col\":\"`orderservice`.`idos`  DESC\"}', '2018-07-13 19:06:23'),
('root', 'link', 'tecnico', '[]', '2018-07-13 19:33:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('', '2018-07-14 03:46:26', '{\"lang\":\"pt\"}'),
('pma', '2018-07-14 04:11:26', '{\"lang\":\"pt\",\"Console\\/Mode\":\"collapse\"}'),
('root', '2018-07-16 23:30:59', '{\"Console\\/Mode\":\"show\",\"Console\\/Height\":96,\"DisplayServersList\":true,\"Server\\/hide_db\":\"\",\"Server\\/only_db\":\"\",\"lang\":\"pt\"}'),
('usuarios', '2018-07-14 04:14:08', '{\"lang\":\"pt\",\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
