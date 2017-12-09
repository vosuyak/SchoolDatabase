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
(1, 1, '87560000', 'Greg Peterson', 23),
(2, 1, '87560010', 'Paul George', 22),
(3, 1, '87560020', 'Bill Cosby', 20),
(4, 1, '87560030', 'Rick Sanchez', 21),
(5, 1, '87560040', 'Donald Trump', 24),
(6, 1, '87560050', 'Eric Cartman', 28),
(7, 2, '87560060', 'David Luiz', 21),
(8, 2, '87560070', 'George Lopez', 20),
(9, 3, '87560080', 'Chris Tucker', 19),
(10, 3, '87560900', 'Dave Chappelle', 18);

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON schools.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';

GRANT SELECT
ON students
TO mgs_tester@localhost
IDENTIFIED BY 'pa55word';
