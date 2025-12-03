Step 1: Create Database & Student Table (phpMyAdmin)

Run this SQL:

CREATE DATABASE school;

USE school;

CREATE TABLE student (
    id INT PRIMARY KEY,
    name VARCHAR(50),
    age INT,
    city VARCHAR(50),
    course VARCHAR(50)
);

Example data (optional for testing):

INSERT INTO student VALUES
(1, 'Rohan', 20, 'Pune', 'BCA'),
(2, 'Sneha', 19, 'Mumbai', 'BCS'),
(3, 'Amit', 21, 'Pune', 'BBA'),
(4, 'Priya', 22, 'Nashik', 'BCA');