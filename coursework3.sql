
-- Solution for objective 2
--- - source ~/Downloads/mysqlsampledatabase.sql;

-- Solution for objective 3
CREATE VIEW custOrders
AS 
SELECT 
    customerName, 
    checkNumber, 
    paymentDate, 
    amount
FROM
    customers
INNER JOIN
    payments USING (customerNumber)
ORDER BY amount DESC;

-- Solution for Objective 4
SELECT * FROM custOrders;

-- Solution for Objective 5
SELECT * FROM custOrders
WHERE customerName = 'Atelier graphique';

-- Solution for Objective 6
CREATE VIEW resolved
AS 
SELECT 
    customerName, 
    orderNumber, 
    orderDate, 
    status
FROM
    customers
INNER JOIN
    orders USING (customerNumber)
WHERE status = 'resolved';

-- Solution for Objective 7
SELECT * FROM resolved;

Solution for Objective 8
UPDATE resolved 
SET 
    status = 'Shipped'
WHERE
    customerName =  'Toys4GrownUps.com';

-- Solution for Objective 9
CREATE VIEW empOffices
AS 
SELECT 
    employeeNumber, 
    firstName, 
    lastName, 
    addressLine1,
    addressLine2
FROM
    offices
INNER JOIN
    employees USING (officeCode);

-- Solution for Objective 10
SELECT * FROM empOffices;

Solution for Objective 11
SET SQL_SAFE_UPDATES = 0;
UPDATE empOffices 
SET 
    addressLine2 = 'Floor 4'
WHERE
    addressLine1 =  '43 Rue Jouffroy D\'abbans';
SET SQL_SAFE_UPDATES = 1;

-- Solution for Objective 12
CREATE TABLE employees_audit (
`id` int auto_increment,
`employeeNumber` int NOT NULL,
`lastname` varchar(50),
`changedat` datetime,
`action` varchar(50),
PRIMARY KEY (`id`)
);

-- Solution for Objective 13
delimiter //
CREATE TRIGGER employee_trigger
	BEFORE UPDATE ON employees
    FOR EACH ROW
    BEGIN
    INSERT INTO employees_audit
    SET
    action = `update`,
    employeeNumber = New.employeeNumber,
    lastName = New.lastName,
    changedat = CURRENT_TIMESTAMP;
    END; //
delimiter ;

-- Solution for Objective 14
CREATE TABLE reorder (
`id` int auto_increment,
`productCode` varchar(15) NOT NULL,
`quantityInStock` int NOT NULL,
`orderQuantity` int NOT NULL,
`loggedDate` datetime,
PRIMARY KEY (`id`)
);

-- Solution for Objective 15
delimiter //
CREATE TRIGGER reorder_trigger
	AFTER UPDATE ON products
    FOR EACH ROW
    BEGIN
    IF NEW.quantityInStock < 500 THEN
    INSERT INTO reorder
    SET
    productCode = old.productCode,
	quantityInStock = New.quantityInStock,
	orderQuantity = 1000 - quantityInStock,
	loggedDate = CURRENT_TIMESTAMP;
	END IF;
    END; //
delimiter //

-- Solution for Objective 16
SET SQL_SAFE_UPDATES = 0;
UPDATE products 
SET 
    productCode = 'S700_1938'
WHERE
    quantityInStock =  '432';
SET SQL_SAFE_UPDATES = 1;

-- Solution for Objective 17
DELIMITER //
 
CREATE PROCEDURE increaseCreditLimit(IN amount INT)
BEGIN
	UPDATE customers
    SET 
    creditLimit = creditLimit * (1 + amount/100);
END //
 
DELIMITER ;

-- Solution for Objective 18
SET SQL_SAFE_UPDATES = 0;
CALL increaseCreditLimit(15);






    

















