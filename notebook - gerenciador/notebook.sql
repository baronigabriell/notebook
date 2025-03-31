-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 31/03/2025 às 20:01
-- Versão do servidor: 9.1.0
-- Versão do PHP: 8.3.14

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
CREATE DATABASE IF NOT EXISTS `notebook` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `notebook`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `alu_codigo` int NOT NULL,
  `alu_sala` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alu_carrinho` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alu_notebook` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alu_retirada` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alu_devolucao` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alu_nome` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`alu_codigo`, `alu_sala`, `alu_carrinho`, `alu_notebook`, `alu_retirada`, `alu_devolucao`, `alu_nome`) VALUES
(3, '2DSSS', '', '', '', '', 'Gabriel Baroni'),
(0, '2DSSS', '', '', '', '', 'Julinha'),
(0, '2DSSS', '', '', '', '', ''),
(0, '2DSSS', '', '', '', '', ''),
(0, '2DSSS', '', '', '', '', ''),
(0, '2DSSS', '', '', '', '', 'Julinha'),
(0, '2DSSS', '', '', '', '', 'Gowi Nasantos'),
(0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `car_codigo` int NOT NULL,
  `car_numero` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_voltagem` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_capacidade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`car_codigo`, `car_numero`, `car_voltagem`, `car_capacidade`) VALUES
(1, 'Carrinho 1', '127V', '20 notebooks'),
(2, 'Carrinho 2', '120V', '20'),
(0, 'Carrinho 3', '120v', '20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notebooks`
--

DROP TABLE IF EXISTS `notebooks`;
CREATE TABLE IF NOT EXISTS `notebooks` (
  `not_codigo` int NOT NULL,
  `not_numero` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_marca` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_modelo` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_carrinho` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `notebooks`
--

INSERT INTO `notebooks` (`not_codigo`, `not_numero`, `not_marca`, `not_modelo`, `not_carrinho`, `not_status`) VALUES
(1, '17', 'SASONG', '1456-H8', 'Carrinho 1', ''),
(2, '1', 'Samsung', '234-HP', 'Carrinho 1', ''),
(3, '2', 'Samsung', '234-HP', 'Carrinho 1', ''),
(4, '3', 'Samsung', '234-HP', 'Carrinho 1', ''),
(5, '4', 'Samsung', '234-HP', 'Carrinho 1', ''),
(6, '5', 'Samsung', '234-HP', 'Carrinho 1', ''),
(7, '1', 'Samsung', '234-HP', 'Carrinho 2', ''),
(8, '2', 'Samsung', '234-HP', 'Carrinho 2', ''),
(9, '3', 'Samsung', '234-HP', 'Carrinho 2', ''),
(10, '4', 'Samsung', '234-HP', 'Carrinho 2', ''),
(11, '5', 'Samsung', '234-HP', 'Carrinho 2', ''),
(0, '1', 'Dell', 'SS', 'Carrinho 3', 'disponivel'),
(0, '2000', 'Dell', 'SS', 'Carrinho 3', 'disponivel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `pro_codigo` int NOT NULL,
  `pro_nome` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_sala` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_materia` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`pro_codigo`, `pro_nome`, `pro_sala`, `pro_materia`) VALUES
(1, 'Sérgio', '2DSSS', 'Biologia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `retiradas`
--

DROP TABLE IF EXISTS `retiradas`;
CREATE TABLE IF NOT EXISTS `retiradas` (
  `retirada_id` int NOT NULL AUTO_INCREMENT,
  `alu_codigo` int NOT NULL,
  `alu_nome` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alu_sala` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_car` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_num` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_retirada` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_devolucao` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`retirada_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `retiradas`
--

INSERT INTO `retiradas` (`retirada_id`, `alu_codigo`, `alu_nome`, `alu_sala`, `not_car`, `not_num`, `hora_retirada`, `hora_devolucao`) VALUES
(57, 3, 'Gabriel Baroni', '2DSSS', 'Carrinho 1', '17', '16:27:30', '2025-03-31 16:28:16'),
(58, 0, 'Julinha', '2DSSS', 'Carrinho 1', '17', '2025-03-31 16:29:43', '2025-03-31 16:29:48'),
(59, 0, 'Gowi Nasantos', '2DSSS', 'Carrinho 1', '17', '31/03/2025 16:30:40', '31/03/2025 16:31:01'),
(60, 3, 'Gabriel Baroni', '2DSSS', 'Carrinho 3', '2000', '31/03/2025 16:53:57', '31/03/2025 16:54:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
