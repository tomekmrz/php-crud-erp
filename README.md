# PHP Complete ERP CRUD Application

### ****Creating the MySQK Database Tables****

Create a table named crud-erp inside your MySQL database using the following code.

-- HR table
CREATE TABLE `hrd` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `salary` INT(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `gender` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

-- Production table
CREATE TABLE `production` (
  `order_id` INT NOT NULL AUTO_INCREMENT,
  `customer_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  `order_date` DATE NOT NULL,
  `status` VARCHAR(255) NOT NULL,
  `priority` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`order_id`),

);

-- Warehouse table
CREATE TABLE `warehouse` (
  `product_id` INT NOT NULL AUTO_INCREMENT,
  `product_name` VARCHAR(255) NOT NULL,
  `location_id` VARCHAR(255) NOT NULL,
  `product_quantity` INT NOT NULL,
  `supplier_id` VARCHAR(255) NOT NULL,
  `received_date` DATE NOT NULL,
  PRIMARY KEY (`product_id`)
);



