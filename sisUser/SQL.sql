-- Criação do banco de dados
CREATE DATABASE usuarios_db;

-- Seleção do banco de dados
USE usuarios_db;

-- Criação da tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil ENUM('normal', 'administrador') DEFAULT 'normal',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserção do administrador inicial
INSERT INTO usuarios (nome, email, senha, perfil) VALUES 
('Administrador', 'admin@exemplo.com', SHA2('senha_admin', 256), 'administrador');
