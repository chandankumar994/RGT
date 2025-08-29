CREATE DATABASE store;
use store;

-- Create the tables
CREATE TABLE products (
  product_id INT PRIMARY KEY AUTO_INCREMENT,
  product_name VARCHAR(100) NOT NULL,
  price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE customers (
  customer_id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE orders (
  order_id INT PRIMARY KEY AUTO_INCREMENT,
  customer_id INT NOT NULL,
  order_date DATE NOT NULL,
  total_amount DECIMAL(10, 2) NOT NULL
);

INSERT INTO products (product_name, price) VALUES
('Laptop', 1200.00),
('Mouse', 25.00),
('Keyboard', 75.00),
('Monitor', 300.00);

INSERT INTO customers (first_name, last_name, email) VALUES
('John', 'Doe', 'john.doe@example.com'),
('Rahul', 'Singh', 'rahul.singh@example.com'),
('Jane', 'Smith', 'jane.smith@example.com');

INSERT INTO orders (customer_id, order_date, total_amount) VALUES
(1, '2025-08-01', 1225.00),
(1, '2025-08-15', 75.00),
(2, '2025-08-20', 300.00);

ALTER TABLE orders
ADD CONSTRAINT fk_customer
FOREIGN KEY (customer_id)
REFERENCES customers(customer_id);

select * from orders;

-- This will fail because customer_id 99 does not exist
INSERT INTO orders (customer_id, order_date, total_amount)
VALUES (99, '2025-08-29', 50.00);

-- This will work becose id 3 is there
INSERT INTO orders (customer_id, order_date, total_amount)
VALUES (3, '2025-08-29', 50.00);

-- inner join example
SELECT
  o.order_id,
  c.first_name,
  c.last_name,
  o.order_date,
  o.total_amount
FROM orders AS o
INNER JOIN customers AS c
  ON o.customer_id = c.customer_id;


-- LEFT Join
SELECT
  c.first_name,
  c.last_name,
  c.email,
  o.order_id,
  o.order_date
FROM customers AS c
LEFT JOIN orders AS o
  ON c.customer_id = o.customer_id;
  
  -- Right Join
 SELECT
  c.first_name,
  c.last_name,
  o.order_id,
  o.order_date
FROM customers AS c
RIGHT JOIN orders AS o
  ON c.customer_id = o.customer_id; 
  
  
--- View
CREATE VIEW customer_order_summary AS
SELECT
  c.customer_id,
  c.first_name,
  c.last_name,
  SUM(o.total_amount) AS total_spent,
  COUNT(o.order_id) AS total_orders
FROM customers AS c
LEFT JOIN orders AS o
  ON c.customer_id = o.customer_id
GROUP BY
  c.customer_id,
  c.first_name,
  c.last_name;

--- select from view
select * from customer_order_summary;

SELECT
  first_name, 
  last_name,
  total_spent
FROM customer_order_summary
WHERE
  total_spent > 1000;
  

  