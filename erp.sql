-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Set-2024 às 01:01
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
-- Banco de dados: `erp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--
DROP DATABASE IF EXISTS `erp`;

CREATE DATABASE `erp`;

USE `erp`;

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empresa_id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_empresa` (`empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `empresa_id`, `nome`, `created_at`, `updated_at`) VALUES
(2, 1, 'Categoria 2', '2024-09-04 04:01:19', '2024-09-04 04:01:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `documento`, `created_at`, `updated_at`) VALUES
(1, 'Miguel e Luiz Buffet Ltda', '64537629000158', '2024-08-29 21:57:44', '2024-08-29 21:57:44'),
(2, 'Nicolas e Rayssa Filmagens Ltda', '73972688000145', '2024-08-29 21:58:04', '2024-08-29 21:58:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empresa_id` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_compra` decimal(9,2) NOT NULL,
  `valor_venda` decimal(9,2) NOT NULL,
  `marca` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidade_medida` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `empresa_id`, `nome`, `valor_compra`, `valor_venda`, `marca`, `modelo`, `unidade_medida`, `descricao`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 1, 'Borracha Cornilleau Target Pro Xd 47.5° Graus Tênis De Mesa Cor Vermelho', '390.00', '390.00', 'Cornilleau', 'Target Pro Xd', 'UN', 'Com esta raquete de tênis de mesa Cornilleau Pro XD 47.5° você terá longas horas de diversão onde e com quem quiser. A prática deste esporte melhora a capacidade e o tempo de reação, a concentração, a memória e a coordenação olho-mão. Escolher a raquete certa afeta seu estilo de jogo, tornando-o mais controlável e confortável. O elemento estrela do ping pong Essa raquete de borracha se caracteriza pela sua durabilidade e rigidez. Com ela, você vai conseguir maior controle sobre a bola.', 'http://http2.mlstatic.com/D_939663-MLU76373353129_052024-O.jpg', '2024-08-30 00:17:16', '2024-08-30 00:17:16'),
(8, 1, 'Borracha Cornilleau Target Pro Xd 47.5° Graus Tênis De Mesa Cor Vermelho', '390.00', '390.00', 'Cornilleau', 'Target Pro Xd', 'UN', 'Com esta raquete de tênis de mesa Cornilleau Pro XD 47.5° você terá longas horas de diversão onde e com quem quiser. A prática deste esporte melhora a capacidade e o tempo de reação, a concentração, a memória e a coordenação olho-mão. Escolher a raquete certa afeta seu estilo de jogo, tornando-o mais controlável e confortável. O elemento estrela do ping pong Essa raquete de borracha se caracteriza pela sua durabilidade e rigidez. Com ela, você vai conseguir maior controle sobre a bola.', 'http://http2.mlstatic.com/D_939663-MLU76373353129_052024-O.jpg', '2024-08-30 00:17:23', '2024-08-30 00:17:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empresa_id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_empresas` (`empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `empresa_id`, `nome`, `email`, `senha`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gustavo Messias', 'gustavo@messias.io', '95c8b1d202f757f7eca7391fb8bfee411573fc7e', '2024-09-04 01:01:52', '2024-09-04 01:01:52');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_empresas` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
