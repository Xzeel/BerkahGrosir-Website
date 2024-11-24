CREATE DATABASE berkah_grosir;
USE berkah_grosir;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, description, price, image_url) VALUES
('Produk 1', 'Deskripsi singkat produk 1.', 100000.00, 'https://via.placeholder.com/300'),
('Produk 2', 'Deskripsi singkat produk 2.', 150000.00, 'https://via.placeholder.com/300'),
('Produk 3', 'Deskripsi singkat produk 3.', 200000.00, 'https://via.placeholder.com/300'),
('Produk 4', 'Deskripsi singkat produk 4.', 250000.00, 'https://via.placeholder.com/300');