CREATE DATABASE customer_crud_app;

USE customer_crud_app;

CREATE TABLE customer (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone_number VARCHAR(15),
    street VARCHAR(255),
	city VARCHAR(100),
	state VARCHAR(100),
	zip_code VARCHAR(20),
    loyalty_program_tier_type ENUM('bronze', 'silver', 'gold') NOT NULL
);