ata run korbi phpmyadmin sql te then register kore dekhbi sob thik cholchhe ki na


CREATE DATABASE IF NOT EXISTS hotel;

USE hotel;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



jodi register kaj na kore tahole aita use korbi

SELECT * FROM users ORDER BY id DESC LIMIT 5;



ata use korebe booking data store korar janno

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('credit_card', 'debit_card', 'upi') NOT NULL,
    card_number VARCHAR(16) NULL,
    expiry_date VARCHAR(5) NULL,
    cvv VARCHAR(4) NULL,
    upi_id VARCHAR(50) NULL,
    payment_id VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
