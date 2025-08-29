-- Trigger learn
-- First, create a logging table
CREATE TABLE product_price_log (
  log_id INT PRIMARY KEY AUTO_INCREMENT,
  product_id INT,
  old_price DECIMAL(10, 2),
  new_price DECIMAL(10, 2),
  change_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the trigger
-- Change the delimiter to allow semicolon inside the trigger body
DELIMITER //
-- Create the trigger
CREATE TRIGGER after_product_update
AFTER UPDATE ON products
FOR EACH ROW
BEGIN
  IF OLD.price <> NEW.price THEN
    INSERT INTO product_price_log (product_id, old_price, new_price)
    VALUES (OLD.product_id, OLD.price, NEW.price);
  END IF;
END//

-- Reset the delimiter
DELIMITER ;


-- Update the price of a product
UPDATE products
SET price = 1250.00
WHERE product_id = 1;

-- Check the log table
SELECT * FROM product_price_log;


-- Create a stored procedure

DELIMITER //
CREATE PROCEDURE GetCustomerOrders(IN cust_id INT)
BEGIN
  SELECT
    o.order_id,
    o.order_date,
    o.total_amount,
    p.product_name
  FROM orders AS o
  INNER JOIN customers AS c
    ON o.customer_id = c.customer_id
  INNER JOIN products AS p
    ON o.total_amount >= p.price -- This is a simplified join for example purposes
  WHERE c.customer_id = cust_id;
END//
DELIMITER ;

-- Execute the stored procedure
CALL GetCustomerOrders(3);
