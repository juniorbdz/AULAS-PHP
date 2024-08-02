-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/08/2024 às 19:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Banco de dados: `books_db`
USE `books_db`;

-- Estrutura para tabela `categoria_tb`
CREATE TABLE `categoria_tb` (
  `categoria_id` INT(11) NOT NULL AUTO_INCREMENT, -- Chave primária auto incrementável
  `nome` VARCHAR(50) NOT NULL, -- Nome da categoria
  `exige_isbn` TINYINT(1) NOT NULL, -- Indica se a categoria exige ISBN
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estrutura para tabela `livro_tb`
CREATE TABLE `livro_tb` (
  `livro_id` INT(11) NOT NULL AUTO_INCREMENT, -- Chave primária auto incrementável
  `titulo` VARCHAR(150) NOT NULL, -- Título do livro
  `categoria_id` INT(11) NOT NULL, -- Referência à categoria do livro
  `genero` VARCHAR(50) NOT NULL, -- Gênero do livro
  `descricao` TEXT NOT NULL, -- Descrição do livro
  `estado_conservacao` VARCHAR(50) NOT NULL, -- Estado de conservação do livro
  `isbn` VARCHAR(13) DEFAULT NULL, -- ISBN do livro, se aplicável
  `usuario_id` INT(11) NOT NULL, -- Referência ao usuário que cadastrou o livro
  PRIMARY KEY (`livro_id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `livro_tb_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_tb` (`categoria_id`), -- Chave estrangeira para categoria_tb
  CONSTRAINT `livro_tb_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario_tb` (`usuario_id`) -- Chave estrangeira para usuario_tb
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estrutura para tabela `tipousuario_tb`
CREATE TABLE `tipousuario_tb` (
  `tipo_usuario_id` INT(11) NOT NULL AUTO_INCREMENT, -- Chave primária auto incrementável
  `descricao` VARCHAR(50) NOT NULL, -- Descrição do tipo de usuário
  PRIMARY KEY (`tipo_usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estrutura para tabela `troca_tb`
CREATE TABLE `troca_tb` (
  `troca_id` INT(11) NOT NULL AUTO_INCREMENT, -- Chave primária auto incrementável
  `livro_oferecido_id` INT(11) NOT NULL, -- Referência ao livro oferecido na troca
  `livro_desejado_id` INT(11) NOT NULL, -- Referência ao livro desejado na troca
  `status` ENUM('Pendente', 'Aceita', 'Recusada') NOT NULL DEFAULT 'Pendente', -- Status da troca
  `data_criacao` DATETIME DEFAULT CURRENT_TIMESTAMP, -- Data de criação da troca
  `data_aceitacao` DATETIME DEFAULT NULL, -- Data de aceitação da troca
  `data_conclusao` DATETIME DEFAULT NULL, -- Data de conclusão da troca
  `usuario_oferecente_id` INT(11) NOT NULL, -- Referência ao usuário que oferece a troca
  `usuario_solicitante_id` INT(11) NOT NULL, -- Referência ao usuário que solicita a troca
  PRIMARY KEY (`troca_id`),
  KEY `livro_oferecido_id` (`livro_oferecido_id`),
  KEY `livro_desejado_id` (`livro_desejado_id`),
  KEY `usuario_oferecente_id` (`usuario_oferecente_id`),
  KEY `usuario_solicitante_id` (`usuario_solicitante_id`),
  CONSTRAINT `troca_tb_ibfk_1` FOREIGN KEY (`livro_oferecido_id`) REFERENCES `livro_tb` (`livro_id`), -- Chave estrangeira para livro_tb
  CONSTRAINT `troca_tb_ibfk_2` FOREIGN KEY (`livro_desejado_id`) REFERENCES `livro_tb` (`livro_id`), -- Chave estrangeira para livro_tb
  CONSTRAINT `troca_tb_ibfk_3` FOREIGN KEY (`usuario_oferecente_id`) REFERENCES `usuario_tb` (`usuario_id`), -- Chave estrangeira para usuario_tb
  CONSTRAINT `troca_tb_ibfk_4` FOREIGN KEY (`usuario_solicitante_id`) REFERENCES `usuario_tb` (`usuario_id`) -- Chave estrangeira para usuario_tb
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estrutura para tabela `usuario_tb`
CREATE TABLE `usuario_tb` (
  `usuario_id` INT(11) NOT NULL AUTO_INCREMENT, -- Chave primária auto incrementável
  `nome` VARCHAR(20) NOT NULL, -- Nome do usuário
  `endereco` VARCHAR(160) NOT NULL, -- Endereço do usuário
  `data_nascimento` DATE NOT NULL, -- Data de nascimento do usuário
  `telefone` VARCHAR(12) NOT NULL, -- Telefone do usuário
  `cpf` VARCHAR(11) NOT NULL UNIQUE, -- CPF do usuário
  `rg` VARCHAR(9) NOT NULL, -- RG do usuário
  `email` VARCHAR(100) NOT NULL UNIQUE, -- E-mail do usuário
  `senha` VARCHAR(100) NOT NULL, -- Senha do usuário
  `tipo_usuario_id` INT(11) NOT NULL, -- Referência ao tipo de usuário
  PRIMARY KEY (`usuario_id`),
  KEY `tipo_usuario_id` (`tipo_usuario_id`),
  CONSTRAINT `usuario_tb_ibfk_1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipousuario_tb` (`tipo_usuario_id`) -- Chave estrangeira para tipousuario_tb
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Restrições para tabelas despejadas
-- Índices e chaves estrangeiras já foram definidos na criação das tabelas

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
