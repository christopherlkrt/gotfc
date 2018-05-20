-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2018 às 00:50
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testefc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `familia`
--

CREATE TABLE `familia` (
  `id` int(11) NOT NULL,
  `nome` varchar(15) DEFAULT NULL,
  `membros` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `familia`
--

INSERT INTO `familia` (`id`, `nome`, `membros`) VALUES
(1, 'Stark', 3),
(2, 'Lannister', 2),
(3, 'Tyrell', NULL),
(4, 'Baratheon', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `guerra`
--

CREATE TABLE `guerra` (
  `id` int(11) NOT NULL,
  `id_desafiadora` int(11) DEFAULT NULL,
  `id_desafiada` int(11) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `id_vencedora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `guerra`
--

INSERT INTO `guerra` (`id`, `id_desafiadora`, `id_desafiada`, `data_inicio`, `data_fim`, `id_vencedora`) VALUES
(1, 2, 1, '2018-05-06', '2018-05-13', 1),
(2, 2, 3, '2018-05-10', '2018-05-11', 2),
(3, 1, 4, '2018-05-10', '2018-05-11', 1),
(4, 4, 2, '2018-05-01', '2018-05-04', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guerra`
--
ALTER TABLE `guerra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_desafiadora` (`id_desafiadora`),
  ADD KEY `id_desafiada` (`id_desafiada`),
  ADD KEY `id_vencedora` (`id_vencedora`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `familia`
--
ALTER TABLE `familia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guerra`
--
ALTER TABLE `guerra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `guerra`
--
ALTER TABLE `guerra`
  ADD CONSTRAINT `id_desafiada` FOREIGN KEY (`id_desafiada`) REFERENCES `familia` (`id`),
  ADD CONSTRAINT `id_desafiadora` FOREIGN KEY (`id_desafiadora`) REFERENCES `familia` (`id`),
  ADD CONSTRAINT `id_vencedora` FOREIGN KEY (`id_vencedora`) REFERENCES `familia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
