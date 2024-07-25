-- schema.sql

-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS ecommerce;

-- Seleccionar la base de datos para usar
USE ecommerce;

-- Elimina las tablas si ya existen
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS products;

-- Crea la tabla de productos
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

-- Inserta algunos datos de ejemplo en la tabla de productos
INSERT INTO products (name, price) VALUES
('Product 1', 19.99),
('Product 2', 29.99),
('Product 3', 39.99);

-- Crea la tabla de pedidos
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Inserta algunos datos de ejemplo en la tabla de pedidos
INSERT INTO orders (product_id, quantity) VALUES
(1, 2),
(2, 1),
(3, 5);
