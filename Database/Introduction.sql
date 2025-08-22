CREATE DATABASE testengine;
use testengine;

-- DROP DATABASE testengine;

CREATE TABLE employees (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    position VARCHAR(50),
    salary DECIMAL(10, 2),
    hire_date DATE
);

-- Get all data from the table
select * from employees;

-- Alter table
ALTER TABLE employees ADD COLUMN department VARCHAR(50);

-- insert into table
INSERT INTO employees (name, position, salary, hire_date, department)
VALUES ('Reeta Tiwari', 'HR Executive', 60000.00, '2025-08-22', 'HR');

INSERT INTO employees (name, position, salary, hire_date, department)
VALUES ('Ankit Jaiswal', 'Admin', 60000.00, '2025-08-22', 'Account');

INSERT INTO employees (name, position, salary, hire_date, department)
VALUES ('Ravi Gupta', 'Admin', 80000.00, '2025-08-22', 'Account');

INSERT INTO employees (name, position, salary, hire_date, department)
VALUES ('Vijay Singh', 'IT Engineer', 90000.00, '2025-08-22', 'IT');

INSERT INTO employees (name, position, salary, hire_date, department)
VALUES ('Shanti', 'IT Security', 1200000.00, '2025-08-22', 'Security');

-- How to query:
select * from employees where department ='Account';
select * from employees where salary >=90000;
select * from employees where name like 'R%';


--DDL, DML, DCL - Home work