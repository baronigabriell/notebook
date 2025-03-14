-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Mar-2025 às 14:07
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `notebook`
--
CREATE DATABASE IF NOT EXISTS `notebook` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `notebook`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `alu_codigo` int NOT NULL AUTO_INCREMENT,
  `alu_nome` varchar(80) NOT NULL,
  `alu_sala` varchar(20) NOT NULL,
  `alu_carrinho` varchar(20) NOT NULL,
  `alu_notebook` varchar(20) NOT NULL,
  `alu_retirada` varchar(40) NOT NULL,
  `alu_devolucao` varchar(40) NOT NULL,
  PRIMARY KEY (`alu_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `car_codigo` int NOT NULL AUTO_INCREMENT,
  `car_numero` varchar(20) NOT NULL,
  `car_voltagem` varchar(20) NOT NULL,
  `car_capacidade` varchar(20) NOT NULL,
  PRIMARY KEY (`car_codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`car_codigo`, `car_numero`, `car_voltagem`, `car_capacidade`) VALUES
(1, 'Carrinho 1', '127V', '20 notebooks');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notebooks`
--

DROP TABLE IF EXISTS `notebooks`;
CREATE TABLE IF NOT EXISTS `notebooks` (
  `not_codigo` int NOT NULL AUTO_INCREMENT,
  `not_numero` varchar(20) NOT NULL,
  `not_marca` varchar(80) NOT NULL,
  `not_modelo` varchar(80) NOT NULL,
  `not_carrinho` varchar(20) NOT NULL,
  PRIMARY KEY (`not_codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `notebooks`
--

INSERT INTO `notebooks` (`not_codigo`, `not_numero`, `not_marca`, `not_modelo`, `not_carrinho`) VALUES
(1, '17', 'SASONG', '1456-H8', 'Carrinho 1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `pro_codigo` int NOT NULL AUTO_INCREMENT,
  `pro_nome` varchar(80) NOT NULL,
  `pro_sala` varchar(20) NOT NULL,
  `pro_materia` varchar(40) NOT NULL,
  PRIMARY KEY (`pro_codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`pro_codigo`, `pro_nome`, `pro_sala`, `pro_materia`) VALUES
(1, 'Sérgio', '2DSSS', 'Biologia');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
