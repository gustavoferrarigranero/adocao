-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Ago-2014 às 20:04
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `adocoes`
--

INSERT INTO `adocoes` (`adocao_id`, `usuario_id`, `animal_id`, `local`, `cidade`, `status`) VALUES
(11, 1, 13, 'em casa', 'Franca', 1),
(12, 1, 14, 'na rua', 'Ribeirão Preto', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `animais`
--

CREATE TABLE IF NOT EXISTS `animais` (
  `animal_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `pelagem` varchar(100) NOT NULL,
  `tamanho` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`animal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `animais`
--

INSERT INTO `animais` (`animal_id`, `nome`, `descricao`, `peso`, `pelagem`, `tamanho`, `foto`, `tipo`) VALUES
(13, 'Betowen', 'Animal grande de pelo alto e dócil com os donos.', '55kg', 'Curta e macía', 'Grande', '73_1.jpg', 'Cachorro'),
(14, 'Titiu', 'Cão vira-latas encontrado andando pela cidade, é dócil e muito quieto.', '15kg', 'Curta', 'Médio', '73_1.jpg', 'Cachorro'),
(15, 'Teste animal perdido', 'perdeuse emtallugar', '5kg', 'curta', 'Médio', 'banner-1.jpg', 'Gato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimentos`
--

CREATE TABLE IF NOT EXISTS `depoimentos` (
  `depoimento_id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `like` int(11) NOT NULL,
  `deslike` int(11) NOT NULL,
  PRIMARY KEY (`depoimento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `depoimentos`
--

INSERT INTO `depoimentos` (`depoimento_id`, `animal_id`, `usuario_id`, `texto`, `like`, `deslike`) VALUES
(1, 13, 1, 'gsfsfsdfdsf', 18, 4),
(2, 13, 1, 'Teste de Depoimento, ele foi bem cuidado blab bla bla blasaakjshjhASKJHKJcuidado blab bla bla blasaakjshjhASKJHKJcuidado blab bla bla blasaakjshjhASKJHKJcuidado blab bla bla blasaakjshjhASKJHKJ', 11, 7),
(3, 13, 1, 'ighskdhjaskdlasd', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `perdidos`
--

INSERT INTO `perdidos` (`perdido_id`, `usuario_id`, `animal_id`, `local`, `cidade`, `status`) VALUES
(1, 1, 15, 'na rua', 'Franca', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nome`, `cpf`, `rg`, `dataNascimento`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `celular`, `email`, `senha`, `status`) VALUES
(1, 'Gustavo', 'fsdfsdf', 'dsfsdf', '2014-08-23', 'sdfsd', 'fdsf', 'sdsd', 'dsfsdfsdf', 'sdfsdf', 'sdfsdf', 'sdf', '1', '1', 1),
(2, 'gdfg', 'dfgdsfgdf', 'gdfgdfsg', '2014-08-19', 'dfgdsfg', 'dfgdfg', 'dfgf', 'dfgdfg', 'fgsdfgd', 'fgdfgdfg', 'dfg', '2', '2', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
