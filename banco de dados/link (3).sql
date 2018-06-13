-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 13-Jun-2018 às 22:44
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
  `user` varchar(25) NOT NULL,
  `nos` varchar(120) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `coord` varchar(10) NOT NULL,
  `ala` varchar(10) NOT NULL,
  `sala` varchar(10) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `setor` varchar(10) NOT NULL,
  `datahora` datetime NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `idtecn` int(11) NOT NULL,
  `idos` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `setor` varchar(10) NOT NULL,
  `datahora` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `laudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`idos`),
  ADD UNIQUE KEY `user` (`idos`);

--
-- Indexes for table `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`idtecn`),
  ADD UNIQUE KEY `datahora` (`datahora`);

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
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
