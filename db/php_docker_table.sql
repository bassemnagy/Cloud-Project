-- create the database if it doesnt exist 
CREATE DATABASE IF NOT EXISTS cloud_project;

-- switch to the specified database
USE cloud_project;

-- create the student table if it doesnt exist 
CREATE TABLE IF NOT EXISTS student (
  Student_ID BIGINT PRIMARY KEY,
  First_Name VARCHAR(255),
  CGPA DECIMAL (3,2) CHECK (CGPA >= 0 AND CGPA <= 4),
  Age INT CHECK (Age > 0)
);

-- Insert Data into the student table while avoiding duplicates
INSERT INTO student (Student_ID, First_Name, CGPA, Age)
VALUES
  (22010067, 'Bassem Nagy', 2.9, 19),
  (20221371221, 'Abdo Abdelhgany', 2.3, 21),
  (20221510020, 'Kirolos Malak', 2.5, 22),
  (20221457701, 'Mina Mounir', 2.2, 21),
  (20222443010, 'Mohamed Raafat', 3.00, 21)

ON DUPLICATE KEY UPDATE
  Student_ID = VALUES(STUDENT_ID),
  First_Name = VALUES(First_Name),
  CGPA = VALUES(CGPA),
  Age = VALUES(Age);