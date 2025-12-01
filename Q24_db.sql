Step 1: Create Employee Table (phpMyAdmin)

CREATE DATABASE company;

USE company;

CREATE TABLE employee (
    emp_id INT PRIMARY KEY,
    name VARCHAR(50),
    age INT,
    salary INT,
    department VARCHAR(50)
);

Insert sample data (optional):
INSERT INTO employee VALUES
(101, 'Rohan', 28, 35000, 'IT'),
(102, 'Sneha', 25, 42000, 'HR'),
(103, 'Amit', 30, 28000, 'Sales'),
(104, 'Priya', 27, 50000, 'IT');