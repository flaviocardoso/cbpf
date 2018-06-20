-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 20-Jun-2018 às 19:34
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
-- Database: `link`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `orderservice`
--

CREATE TABLE `orderservice` (
  `idos` int(11) NOT NULL,
  `user` varchar(25) DEFAULT NULL,
  `nos` varchar(120) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `coord` varchar(10) DEFAULT NULL,
  `ala` varchar(10) DEFAULT NULL,
  `sala` varchar(10) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `setor` varchar(10) NOT NULL,
  `datahora` datetime NOT NULL,
  `descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orderservice`
--

INSERT INTO `orderservice` (`idos`, `user`, `nos`, `nome`, `email`, `coord`, `ala`, `sala`, `telefone`, `setor`, `datahora`, `descr`) VALUES
(6, '', 'cat/20180614163243', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'comp', '123', '(021)39032065', 'meca', '2018-06-14 16:32:43', 'teste de rotina 3937'),
(7, '', 'cat/20180614203055', 'teste', 'teste1@hotmail.com', 'cat', 'comp', '123', '(21)39032065', 'meca', '2018-06-14 20:30:55', 'teste para usuÃ¡rio'),
(9, 'flavioc41', 'cat/20180619155341', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'comp', '123', '(021)39032065', 'meca', '2018-06-19 15:53:41', 'tetste tetsttetest'),
(10, 'flavioc41', 'cat/20180619162135', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'comp', '123', '(021)39032065', 'meca', '2018-06-19 16:21:35', 'teste 79749729'),
(11, 'flavioc41', 'cat/20180619162651', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'comp', '123', '(021)39032065', 'meca', '2018-06-19 16:26:51', 'tettggjgtue 775757472672'),
(12, 'flavioc41', 'cat/20180619162841', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'comp', '123', '(021)39032065', 'meca', '2018-06-19 16:28:41', 'tettggjgtue 775757472672'),
(13, 'flavioc41', 'cat/20180619163230', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'comp', '123', '(021)39032065', 'meca', '2018-06-19 16:32:30', 'tettggjgtue 775757472672'),
(14, 'flavioc41', 'cat/20180619163258', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'comp', '123', '(021)39032065', 'meca', '2018-06-19 16:32:58', 'etstte 6664658368'),
(15, 'flavioc41', 'cat/20180619163738', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'comp', '123', '(021)39032065', 'meca', '2018-06-19 16:37:38', 'testte 658638658'),
(16, 'flavioc41', 'cat/20180619163822', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'comp', '123', '(021)39032065', 'meca', '2018-06-19 16:38:22', 'tetste shfhiyshifh'),
(17, 'flavioc41', 'cat/20180619172442', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'comp', '123', '(021)39032065', 'meca', '2018-06-19 17:24:42', 'retesfdsfestfdg 645646353'),
(18, 'flavioc41', 'cat/20180620031321', 'Flavio Cardoso', 'flavioc41@gmail.com', 'cat', 'comp', '123', '(021)39032065', 'elet', '2018-06-20 03:13:21', 'teste para elet1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `idtecn` int(11) NOT NULL,
  `idos` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `setor` varchar(10) NOT NULL,
  `datahora` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `laudo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tecnico`
--

INSERT INTO `tecnico` (`idtecn`, `idos`, `nome`, `user`, `setor`, `datahora`, `status`, `laudo`) VALUES
(1, 16, NULL, NULL, 'meca', '2018-06-19 16:38:22', 'NOVA', NULL),
(2, 17, NULL, NULL, 'meca', '2018-06-19 17:24:42', 'NOVA', NULL),
(3, 18, NULL, NULL, 'elet', '2018-06-20 03:13:21', 'NOVA', NULL);

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
(1, 'teste', 'teste1', 'teste1@hotmail.com', '(21)39032065', '1234', 'meca', '', '', '', 3, 1, '2018-06-02 00:00:00'),
(2, 'teste', 'teste2', 'teste2@hotmail.com', '(21)39032065', '1234', 'meca', NULL, NULL, NULL, 3, 1, '2018-06-02 22:13:00'),
(3, 'Flavio Cardoso', 'flavioc41', 'flavioc41@gmail.com', '(021)39032065', '1234', 'elet', '123', 'cat', 'comp', 1, 1, '2018-06-02 22:21:27');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `orderservice`
--
ALTER TABLE `orderservice`
  MODIFY `idos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `idtecn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tecnico`
--
ALTER TABLE `tecnico`
  ADD CONSTRAINT `tecnico_ibfk_1` FOREIGN KEY (`idos`) REFERENCES `orderservice` (`idos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
