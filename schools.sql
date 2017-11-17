-- create and select the database
DROP DATABASE IF EXISTS schools;
CREATE DATABASE schools;
USE schools;  -- MySQL command

-- create the room tables
CREATE TABLE rooms (
  roomID       INT(11)        NOT NULL   AUTO_INCREMENT,
  roomName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (roomID)
);

-- create the students tables
CREATE TABLE students (
  studentID        INT(11)        NOT NULL   AUTO_INCREMENT,
  roomID       INT(11)        NOT NULL,
  studentUlid      VARCHAR(10)    NOT NULL   UNIQUE,
  studentName      VARCHAR(255)   NOT NULL,
  studentYear      VARCHAR(6)        NOT NULL,
  PRIMARY KEY (studentID)
);

-- insert data into the database
INSERT INTO rooms VALUES
(1, 'TEC 319'),
(2, 'TEC 283'),
(3, 'TEC 313');

INSERT INTO students VALUES
(1, 1, '87560000', 'Fender Stratocaster', 'Sr.'),
(2, 1, '87560010', 'Gibson Les Paul', 'Sr.'),
(3, 1, '87560020', 'Gibson SG', 'Sr.'),
(4, 1, '87560030', 'Yamaha FG700S', 'Sr.'),
(5, 1, '87560040', 'Washburn D10S', 'Sr.'),
(6, 1, '87560050', 'Rodriguez Caballero 11', 'Sr.'),
(7, 2, '87560060', 'Fender Precision', 'Sr.'),
(8, 2, '87560070', 'Hofner Icon', 'Sr.'),
(9, 3, '87560080', 'Ludwig 5-piece Drum Set with Cymbals', 'Sr.'),
(10, 3, '87560900', 'Tama 5-Piece Drum Set with Cymbals', 'Sr.');

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON schools.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';

GRANT SELECT
ON students
TO mgs_tester@localhost
IDENTIFIED BY 'pa55word';
