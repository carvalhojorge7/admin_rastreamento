CREATE DATABASE nome_do_banco;

USE nome_do_banco;

-- Tabela "users"
CREATE TABLE users (
    user VARCHAR(50) NOT NULL,
    senha VARCHAR(32) NOT NULL, -- hash MD5 tem 32 caracteres
    last_login DATETIME,
    PRIMARY KEY (user)
);

-- Tabela "rastreamento"
CREATE TABLE rastreamento (
    pedido INT NOT NULL,
    status VARCHAR(50) NOT NULL,
    detalhes VARCHAR(200) NOT NULL,
    PRIMARY KEY (pedido)
);

INSERT INTO users (user, senha, last_login) 
VALUES ('EMAIL', MD5('SENHA'), NULL);
