CREATE DATABASE college;

USE college;

CREATE TABLE course (
    cid INT PRIMARY KEY,
    cname VARCHAR(50)
);

INSERT INTO course VALUES
(1, 'BCA'),
(2, 'BCS'),
(3, 'BBA'),
(4, 'BCom'),
(5, 'MCA');
