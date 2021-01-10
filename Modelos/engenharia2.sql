-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10-Jan-2021 às 00:34
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engenharia2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `id_hospital` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `auditor` varchar(40) NOT NULL,
  PRIMARY KEY (`id_hospital`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hospital`
--

INSERT INTO `hospital` (`id_hospital`, `nome`, `auditor`) VALUES
(1, 'hospital pro', 'Danilo Machado Coelho'),
(2, 'CLEAN', 'Danilo Machado Coelho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `internacao`
--

DROP TABLE IF EXISTS `internacao`;
CREATE TABLE IF NOT EXISTS `internacao` (
  `id_internacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `planosaude` varchar(40) NOT NULL,
  `hospital` varchar(40) NOT NULL,
  `auditor` varchar(40) NOT NULL,
  `diainternacao` date NOT NULL,
  PRIMARY KEY (`id_internacao`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `internacao`
--

INSERT INTO `internacao` (`id_internacao`, `nome`, `cpf`, `planosaude`, `hospital`, `auditor`, `diainternacao`) VALUES
(16, 'Mauricio Rodrigues Silva', '555.555.555-55', 'SAUDE-PRO', 'hospital pro', 'Danilo Machado Coelho', '2021-01-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `planosaude` varchar(40) NOT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `cpf`, `nome`, `planosaude`) VALUES
(1, '555.555.555-55', 'Mauricio Rodrigues Silva', 'SAUDE-PRO'),
(2, '343.434.123-66', 'Paciente Teste', 'TUDOCLEAN');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planodesaude`
--

DROP TABLE IF EXISTS `planodesaude`;
CREATE TABLE IF NOT EXISTS `planodesaude` (
  `id_plano` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `cobertura` varchar(40) NOT NULL,
  `hospital` varchar(40) NOT NULL,
  `tipovisita` int(11) NOT NULL,
  PRIMARY KEY (`id_plano`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `planodesaude`
--

INSERT INTO `planodesaude` (`id_plano`, `nome`, `cobertura`, `hospital`, `tipovisita`) VALUES
(1, 'SAUDE-PRO', 'internacao', 'hospital pro', 3),
(2, 'TUDOCLEAN', 'internacao', 'CLEAN', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

DROP TABLE IF EXISTS `relatorio`;
CREATE TABLE IF NOT EXISTS `relatorio` (
  `nome` varchar(40) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `planodesaude` varchar(40) NOT NULL,
  `hospital` varchar(40) NOT NULL,
  `auditor` varchar(40) NOT NULL,
  `datacad` date NOT NULL,
  `condicao` varchar(12) NOT NULL,
  `relatorio` text NOT NULL,
  `id_relatorio` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_relatorio`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorio`
--

INSERT INTO `relatorio` (`nome`, `cpf`, `planodesaude`, `hospital`, `auditor`, `datacad`, `condicao`, `relatorio`, `id_relatorio`) VALUES
('Paciente Teste', '343.434.123-66', 'TUDOCLEAN', 'CLEAN', 'Danilo Machado Coelho', '2021-01-12', 'Alta', 'teste1', 7),
('Paciente Teste', '343.434.123-66', 'TUDOCLEAN', 'CLEAN', 'Danilo Machado Coelho', '2021-01-12', 'Alta', 'Teste!', 6),
('Paciente Teste', '343.434.123-66', 'TUDOCLEAN', 'CLEAN', 'Danilo Machado Coelho', '2021-01-20', 'Internacao', 'continuar internado!', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `nomec` varchar(40) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `senha`, `tipo`, `nomec`) VALUES
(4, 'danilo', '21232f297a57a5a743894a0e4a801fc3', 'medico', 'Danilo Machado Coelho'),
(5, 'Maria', '21232f297a57a5a743894a0e4a801fc3', 'atendente', 'Maria Campelo Silva');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
