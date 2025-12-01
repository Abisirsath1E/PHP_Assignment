CREATE DATABASE shopdb;

USE shopdb;

CREATE TABLE fruit (
    fid INT PRIMARY KEY,
    fname VARCHAR(50)
);

INSERT INTO fruit VALUES
(1, 'Apple'),
(2, 'Banana'),
(3, 'Orange'),
(4, 'Mango'),
(5, 'Grapes');
