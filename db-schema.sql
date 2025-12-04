-- ===========================================
-- Database Schema for the Classic Sales System
-- ===========================================

DROP DATABASE IF EXISTS cache_system;

CREATE DATABASE cache_system;

USE cache_system;



-- ==========================
-- Table: productlines
-- ==========================
CREATE TABLE productlines (
    productLine VARCHAR(50) PRIMARY KEY,
    textDescription TEXT,
    htmlDescription TEXT,
    image BLOB
);

-- ==========================
-- Table: products
-- ==========================
CREATE TABLE products (
    productCode VARCHAR(15) PRIMARY KEY,
    productName VARCHAR(70) NOT NULL,
    productLine VARCHAR(50) NOT NULL,
    productScale VARCHAR(10),
    productVendor VARCHAR(50),
    productDescription TEXT,
    quantityInStock INT,
    buyPrice DECIMAL(10,2),
    MSRP DECIMAL(10,2),

    FOREIGN KEY (productLine) REFERENCES productlines(productLine)
);

-- ==========================
-- Table: offices
-- ==========================
CREATE TABLE offices (
    officeCode VARCHAR(10) PRIMARY KEY,
    city VARCHAR(50),
    phone VARCHAR(20),
    addressLine1 VARCHAR(50),
    addressLine2 VARCHAR(50),
    state VARCHAR(50),
    country VARCHAR(50),
    postalCode VARCHAR(15),
    territory VARCHAR(10)
);

-- ==========================
-- Table: employees
-- ==========================
CREATE TABLE employees (
    employeeNumber INT PRIMARY KEY,
    lastName VARCHAR(50),
    firstName VARCHAR(50),
    extension VARCHAR(10),
    email VARCHAR(100),
    officeCode VARCHAR(10),
    reportsTo INT,
    jobTitle VARCHAR(50),

    FOREIGN KEY (officeCode) REFERENCES offices(officeCode),
    FOREIGN KEY (reportsTo) REFERENCES employees(employeeNumber)
);

-- ==========================
-- Table: customers
-- ==========================
CREATE TABLE customers (
    customerNumber INT PRIMARY KEY,
    customerName VARCHAR(50),
    contactLastName VARCHAR(50),
    contactFirstName VARCHAR(50),
    phone VARCHAR(20),
    addressLine1 VARCHAR(50),
    addressLine2 VARCHAR(50),
    city VARCHAR(50),
    state VARCHAR(50),
    postalCode VARCHAR(15),
    country VARCHAR(50),
    salesRepEmployeeNumber INT,
    creditLimit DECIMAL(10,2),

    FOREIGN KEY (salesRepEmployeeNumber) REFERENCES employees(employeeNumber)
);

-- ==========================
-- Table: orders
-- ==========================
CREATE TABLE orders (
    orderNumber INT PRIMARY KEY,
    orderDate DATE,
    requiredDate DATE,
    shippedDate DATE,
    status VARCHAR(20),
    comments TEXT,
    customerNumber INT NOT NULL,

    FOREIGN KEY (customerNumber) REFERENCES customers(customerNumber)
);

-- ==========================
-- Table: orderdetails
-- ==========================
CREATE TABLE orderdetails (
    orderNumber INT NOT NULL,
    productCode VARCHAR(15) NOT NULL,
    quantityOrdered INT,
    priceEach DECIMAL(10,2),
    orderLineNumber SMALLINT,

    PRIMARY KEY (orderNumber, productCode),
    FOREIGN KEY (orderNumber) REFERENCES orders(orderNumber),
    FOREIGN KEY (productCode) REFERENCES products(productCode)
);

-- ==========================
-- Table: payments
-- ==========================
CREATE TABLE payments (
    customerNumber INT NOT NULL,
    checkNumber VARCHAR(50) NOT NULL,
    paymentDate DATE,
    amount DECIMAL(10,2),

    PRIMARY KEY (customerNumber, checkNumber),
    FOREIGN KEY (customerNumber) REFERENCES customers(customerNumber)
);

