CREATE DATABASE IF NOT EXISTS loja_etim;
USE loja_etim;

CREATE TABLE produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(120),
    descricao TEXT,
    valor DOUBLE
);

CREATE TABLE imagens (
    id_img INT AUTO_INCREMENT PRIMARY KEY,
    nome_img VARCHAR(80),
    fk_id_produto INT,
    CONSTRAINT fk_imagens_produtos
        FOREIGN KEY (fk_id_produto)
        REFERENCES produtos (id_produto)
);
