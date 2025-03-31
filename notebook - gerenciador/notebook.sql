-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/03/2025 às 04:57
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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

CREATE TABLE `aluno` (
  `alu_codigo` int(11) NOT NULL,
  `alu_sala` varchar(20) NOT NULL,
  `alu_carrinho` varchar(20) NOT NULL,
  `alu_notebook` varchar(20) NOT NULL,
  `alu_retirada` varchar(40) NOT NULL,
  `alu_devolucao` varchar(40) NOT NULL,
  `alu_nome` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`alu_codigo`, `alu_sala`, `alu_carrinho`, `alu_notebook`, `alu_retirada`, `alu_devolucao`, `alu_nome`) VALUES
(3, '2DSSS', '', '', '', '', 'Gabriel Baroni');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `car_codigo` int(11) NOT NULL,
  `car_numero` varchar(20) NOT NULL,
  `car_voltagem` varchar(20) NOT NULL,
  `car_capacidade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`car_codigo`, `car_numero`, `car_voltagem`, `car_capacidade`) VALUES
(1, 'Carrinho 1', '127V', '20 notebooks'),
(2, 'Carrinho 2', '120V', '20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notebooks`
--

CREATE TABLE `notebooks` (
  `not_codigo` int(11) NOT NULL,
  `not_numero` varchar(20) NOT NULL,
  `not_marca` varchar(80) NOT NULL,
  `not_modelo` varchar(80) NOT NULL,
  `not_carrinho` varchar(20) NOT NULL,
  `not_status` varchar(20) NOT NULL
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
(11, '5', 'Samsung', '234-HP', 'Carrinho 2', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `pro_codigo` int(11) NOT NULL,
  `pro_nome` varchar(80) NOT NULL,
  `pro_sala` varchar(20) NOT NULL,
  `pro_materia` varchar(40) NOT NULL
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

CREATE TABLE `retiradas` (
  `retirada_id` int(11) NOT NULL,
  `alu_codigo` int(11) NOT NULL,
  `alu_nome` varchar(80) NOT NULL,
  `alu_sala` varchar(20) NOT NULL,
  `not_car` varchar(20) NOT NULL,
  `not_num` varchar(20) NOT NULL,
  `hora_retirada` varchar(20) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `retiradas`
--

INSERT INTO `retiradas` (`retirada_id`, `alu_codigo`, `alu_nome`, `alu_sala`, `not_car`, `not_num`, `hora_retirada`) VALUES
(0, 3, '', '2DSSS', 'Carrinho 2', '1', '0000-00-00 00:00:00'),
(0, 3, '', '2DSSS', 'Carrinho 1', '17', '23:38:40');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`alu_codigo`);

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`car_codigo`),
  ADD KEY `car_numero` (`car_numero`);

--
-- Índices de tabela `notebooks`
--
ALTER TABLE `notebooks`
  ADD PRIMARY KEY (`not_codigo`),
  ADD KEY `not_numero` (`not_numero`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`pro_codigo`);

--
-- Índices de tabela `retiradas`
--
ALTER TABLE `retiradas`
  ADD KEY `alu_codigo` (`alu_codigo`),
  ADD KEY `not_car` (`not_car`),
  ADD KEY `not_numero` (`not_num`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `alu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `car_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `notebooks`
--
ALTER TABLE `notebooks`
  MODIFY `not_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `retiradas`
--
ALTER TABLE `retiradas`
  ADD CONSTRAINT `retiradas_ibfk_1` FOREIGN KEY (`alu_codigo`) REFERENCES `aluno` (`alu_codigo`),
  ADD CONSTRAINT `retiradas_ibfk_2` FOREIGN KEY (`not_car`) REFERENCES `carrinho` (`car_numero`),
  ADD CONSTRAINT `retiradas_ibfk_3` FOREIGN KEY (`not_num`) REFERENCES `notebooks` (`not_numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
