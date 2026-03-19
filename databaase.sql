DROP DATABASE IF EXISTS flood_db;
CREATE DATABASE flood_db;
USE flood_db;


CREATE TABLE admins (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(70) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL
);


CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(70) NOT NULL,
    nic VARCHAR(20) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL
);



CREATE TABLE requests (
    request_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, 
    relief_type VARCHAR(50) NOT NULL,
    district VARCHAR(30) NOT NULL,
    d_secretariat VARCHAR(70) NOT NULL, 
    gn_division VARCHAR(70) NOT NULL, 
    contact_name VARCHAR(70) NOT NULL, 
    contact_number VARCHAR(20) NOT NULL, 
    address VARCHAR(200) NOT NULL, 
    family_members INT NOT NULL, 
    flood_severity VARCHAR(20) NOT NULL, 
    description VARCHAR(300), 
    
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);
ALTER TABLE requests AUTO_INCREMENT = 1001;


INSERT INTO admins (name, username, password) 
VALUES ('Root Admin', 'admin', 'admin123');

INSERT INTO users (name, nic, username, password) 
VALUES ('kavindi', '20045365258925', 'user', 'user123');
