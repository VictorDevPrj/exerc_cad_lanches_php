/* EXERCICIO 19 */
CREATE DATABASE lanchonete;

USE lanchonete;

CREATE TABLE cardapio(
    id INT PRIMARY KEY AUTO_INCREMENT,
    codigo INT NOT NULL UNIQUE,
    desc_produto VARCHAR(64) NOT NULL,
    preco FLOAT(10, 2) NOT NULL
);

