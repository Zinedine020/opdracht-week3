CREATE DATABASE  supermarkt;

USE supermarkt;

CREATE TABLE  Products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_naam VARCHAR(255),
    prijs_per_stuk DECIMAL(10,2),
    omschrijving TEXT
);




