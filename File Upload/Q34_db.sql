CREATE DATABASE filedb;

USE filedb;

CREATE TABLE uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(100),
    upload_date DATETIME
);
