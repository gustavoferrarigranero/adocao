-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Ago-2014 às 22:29
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adocao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adocoes`
--

CREATE TABLE IF NOT EXISTS `adocoes` (
  `adocao_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `local` varchar(250) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`adocao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `adocoes`
--

INSERT INTO `adocoes` (`adocao_id`, `usuario_id`, `animal_id`, `local`, `cidade`, `status`) VALUES
(1, 1, 2, 'Na rua', 'Franca', 0),
(2, 1, 3, 'Chacara', 'Franca', 0),
(3, 1, 4, 'sdsad', 'sadasd', 0),
(4, 1, 5, 'vcxv', 'xcvxv', 0),
(5, 1, 6, 'vcxv', 'xcvxv', 0),
(6, 1, 7, 'vcxv', 'xcvxv', 0),
(7, 1, 8, 'vcxv', 'xcvxv', 0),
(8, 1, 10, 'dsfsd', 'sdfdsf', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `animais`
--

CREATE TABLE IF NOT EXISTS `animais` (
  `animal_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `peso` float NOT NULL,
  `pelagem` varchar(100) NOT NULL,
  `tamanho` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`animal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `animais`
--

INSERT INTO `animais` (`animal_id`, `nome`, `descricao`, `peso`, `pelagem`, `tamanho`, `foto`, `tipo`) VALUES
(1, 'Jack', 'Vira Lata', 30, 'curta', 'medio', '', 1),
(2, 'Chuck', 'sdasdasdas', 10, 'curta', 'medio', '', 1),
(3, 'Pet', 'shdskjdhasjdhajskd', 1, 'curta', 'Médio', '', 1),
(4, 'adasdas', 'asdasdasasdasdasdasdasd', 23, '23', 'Médio', '', 1),
(5, 'czxc', 'xczxczxc', 343, '232', 'Grande', '', 0),
(6, 'czxc', 'xczxczxc', 343, '232', 'Grande', '', 0),
(7, 'czxc', 'xczxczxc', 343, '232', 'Grande', '', 0),
(8, 'czxc', 'xczxczxc', 343, '232', 'Grande', '', 0),
(9, 'asdasdasdasd', 'asdasdasdasdas', 23, 'fdfsdf', 'Pequeno', '', 0),
(10, 'asdasdasdasd', 'asdasdasdasdas', 23, 'fdfsdf', 'Pequeno', '73_1.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perdidos`
--

CREATE TABLE IF NOT EXISTS `perdidos` (
  `perdido_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `local` varchar(250) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`perdido_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nome`, `cpf`, `rg`, `dataNascimento`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `celular`, `email`, `senha`, `status`) VALUES
(1, 'Gustavo', 'fsdfsdf', 'dsfsdf', '2014-08-23', 'sdfsd', 'fdsf', 'sdsd', 'dsfsdfsdf', 'sdfsdf', 'sdfsdf', 'sdf', '1', '1', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
