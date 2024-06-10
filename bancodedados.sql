CREATE DATABASE IF NOT EXISTS sistema_conta;

USE sistema_conta;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS resultados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    resultado TEXT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
