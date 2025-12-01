CREATE DATABASE website;

USE website;

CREATE TABLE feedback (
    fid INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50),
    email VARCHAR(50),
    message TEXT
);
