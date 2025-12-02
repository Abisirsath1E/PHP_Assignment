CREATE DATABASE companydb;

USE companydb;

CREATE TABLE EMP_TABLE (
    empid INT PRIMARY KEY,
    name VARCHAR(50),
    age INT,
    address VARCHAR(150),
    mobile VARCHAR(15),
    gender VARCHAR(10),
    hobbies VARCHAR(200),
    photo_path VARCHAR(200),
    degree_path VARCHAR(200)
);
