CREATE DATABASE if NOT EXISTS product_db;
use product_db;
CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(255),
    description VARCHAR(255)
);
CREATE TABLE  product(
    id INT AUTO_INCREMENT PRYMARY KEY,
    nom VARCHAR (255),
    price INT,
    quantity INT,
    image VARCHAR(255),
    FOREIGN KEY(categoryId) REFERENCE category(id) ON DELETE CASCADE

);
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    telephone VARCHAR(255),
    email VARCHAR(255),
    login varchar(255),
    password VARCHAR(255),
    role VARCHAR(255)
);