-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Mar-2017 às 07:21
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `estoque_mercearia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(38, 'Automotivo'),
(36, 'Carnes'),
(24, 'Cereais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `distribuidor`
--

CREATE TABLE IF NOT EXISTS `distribuidor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `distribuidor`
--

INSERT INTO `distribuidor` (`id`, `nome`, `cnpj`) VALUES
(4, 'Clorox', '34.666.075/0001-28'),
(9, 'Daniel Soares Meurer', '30.123.237/0001-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lotes`
--

CREATE TABLE IF NOT EXISTS `lotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distribuidor` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Lotes_fk0` (`distribuidor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `podutoslotes`
--

CREATE TABLE IF NOT EXISTS `podutoslotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL,
  `lote_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `PodutosLotes_fk0` (`produto_id`),
  KEY `PodutosLotes_fk1` (`lote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `codBarras` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao` (`descricao`),
  UNIQUE KEY `descricao_2` (`descricao`),
  UNIQUE KEY `descricao_3` (`descricao`),
  KEY `Produtos_fk0` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao`, `categoria_id`, `codBarras`) VALUES
(8, 'Arroz 5k Zaffari', 24, '545445445545458'),
(9, 'Arroz 1k Gaiteiro', 24, '54544544554533');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `Lotes_fk0` FOREIGN KEY (`distribuidor`) REFERENCES `distribuidor` (`id`);

--
-- Limitadores para a tabela `podutoslotes`
--
ALTER TABLE `podutoslotes`
  ADD CONSTRAINT `PodutosLotes_fk1` FOREIGN KEY (`lote_id`) REFERENCES `lotes` (`id`),
  ADD CONSTRAINT `PodutosLotes_fk0` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `Produtos_fk0` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
