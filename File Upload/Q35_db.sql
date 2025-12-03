CREATE DATABASE companydb;

USE companydb;

CREATE TABLE EMP_TABLE (
    empid INT PRIMARY KEY,
    name VARCHAR(50),
    age INT,
    address VARCHAR(100),
    mobile VARCHAR(15),
    gender VARCHAR(10),
    hobbies VARCHAR(100),
    photo LONGBLOB
);

