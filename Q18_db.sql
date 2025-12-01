Step 1: Create Database & Table

Run this SQL in phpMyAdmin:

CREATE DATABASE company;

USE company;

CREATE TABLE emp (
    empno INT PRIMARY KEY,
    name VARCHAR(50),
    age INT,
    gender VARCHAR(10),
    address VARCHAR(100)
);