CREATE DATABASE superMarket;
USE superMarket;

CREATE TABLE department(
	departmentName VARCHAR(20) NOT NULL,
	managerID INT(5) NOT NULL,
	vacancy INT,
	PRIMARY KEY (departmentName)
);

CREATE TABLE product(
	productID INT(4) auto_increment,
	productName VARCHAR(50) NOT NULL,
	brandName VARCHAR(50) NOT NULL,
	departmentName VARCHAR(20) NOT NULL,
	costPrice DECIMAL(10,2) NOT NULL CHECK(costPrice > 0),
	MRP DECIMAL(11,2) NOT NULL CHECK(MRP > 0),
	quantityStock INT NOT NULL,
	PRIMARY KEY (productID),
	FOREIGN KEY (departmentName) REFERENCES department(departmentName)
);

CREATE TABLE foodSection(
	productID INT(4),
	manufactureDate DATE,
	expiryDate DATE NOT NULL,
	quantity VARCHAR(10) NOT NULL default ' - ',
	PRIMARY KEY (productID),
	FOREIGN KEY (productID) REFERENCES product(productID)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE household(
	productID INT(4),
	quantity VARCHAR(10) NOT NULL default ' - ',
	category VARCHAR(50) NOT NULL default ' - ',
	PRIMARY KEY (productID),
	FOREIGN KEY (productID) REFERENCES product(productID)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE electronics(
	productID INT(4),
	powerRating INT(1),
	warranty VARCHAR(100),
	details VARCHAR(200),
	PRIMARY KEY (productID),
	FOREIGN KEY (productID) REFERENCES product(productID)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE sports(
	productID INT(4),
	warranty VARCHAR(100),
	details VARCHAR(200),
	category VARCHAR(50),
	PRIMARY KEY (productID),
	FOREIGN KEY (productID) REFERENCES product(productID)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE clothes(
	productID INT(4),
	category VARCHAR(50),
	size VARCHAR(3) CHECK (size IN ("XS", "S", "M", "L", "XL", "XXL")),
	season VARCHAR(20) CHECK (season IN("Summer Wear", "Winter Wear", "Monsoon Wear", "AllTime")),
	PRIMARY KEY (productID),
	FOREIGN KEY (productID) REFERENCES product(productID)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE supplier(
	supplierID INT(4) NOT NULL auto_increment,
	supplierName VARCHAR(50) NOT NULL,
	phoneNo DECIMAL(11, 0) NOT NULL,
	supplierAddress VARCHAR(200) NOT NULL,
	emailID VARCHAR(50) CHECK(emailID LIKE("%@%.%")),
	PRIMARY KEY (supplierID)
);

CREATE TABLE ordered(
	orderID INT(4) NOT NULL auto_increment,
	supplierID INT(4) NOT NULL,
	productID INT(4) NOT NULL,
	orderDate DATE NOT NULL,
	quantityOrdered INT NOT NULL,
	PRIMARY KEY (orderID),
	FOREIGN KEY (supplierID) REFERENCES supplier(supplierID),
	FOREIGN KEY (productID) REFERENCES product(productID)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE supplied(
	supplyID INT(4) NOT NULL auto_increment,
	orderID INT(4) NOT NULL,
	supplyDate DATE NOT NULL,
	quantitySupplied INT NOT NULL,
	PRIMARY KEY (supplyID),
	FOREIGN KEY (orderID) REFERENCES ordered(orderID)
);

CREATE TABLE employee(
	employeeID INT(5) NOT NULL auto_increment,
	employeeName VARCHAR(50) NOT NULL,
	DOB DATE NOT NULL,
	phoneNo DECIMAL(11, 0) NOT NULL,
	employeeAddress VARCHAR(200) NOT NULL,
	emailID VARCHAR(50) CHECK(emailID LIKE("%@%.%")),
	joinDate DATE NOT NULL,
	salary DECIMAL(10,2) NOT NULL,
	departmentName VARCHAR(20) NOT NULL,

	PRIMARY KEY (employeeID),
	FOREIGN KEY (departmentName) REFERENCES department(departmentName)
);

CREATE TABLE discount(
	discountID INT(5) NOT NULL auto_increment,
	amount DECIMAL(10,2) CHECK(amount >= 0),
	discountPercent DECIMAL(4, 2) CHECK(discountPercent >= 0),
	validUpto DATE NOT NULL,
	details VARCHAR(200),
	termsAndConditions VARCHAR(200),

	PRIMARY KEY (discountID)
);

CREATE TABLE offers(
	discountID INT(5),
	productID INT(4),
	PRIMARY KEY (discountID, productID),
	FOREIGN KEY (discountID) REFERENCES discount(discountID)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	FOREIGN KEY (productID) REFERENCES product(productID)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE customer(
	customerID INT(9) NOT NULL auto_increment,
	customerName VARCHAR(50) NOT NULL,
	phoneNo DECIMAL(10 , 0) NOT NULL,
	customerAddress VARCHAR(200),
	emailID VARCHAR(50) CHECK(emailID LIKE("%@%.%")),
	joinDate DATE,
	moneySpent DECIMAL(12,2),

	PRIMARY KEY (customerID)
);

CREATE TABLE bill(
	billNo INT(9) NOT NULL auto_increment,
	billDate DATE NOT NULL,
	customerID INT(9) NOT NULL,
	amount DECIMAL(12, 2),

	PRIMARY KEY (billNo),
	FOREIGN KEY (customerID) REFERENCES customer(customerID)
);

CREATE TABLE sales(
	billNo INT(9) NOT NULL,
	productID INT(4) NOT NULL,
	discountID INT(5),
	quantitySold INT NOT NULL,
	PRIMARY KEY (billNo, productID),
	FOREIGN KEY (billNo) REFERENCES bill(billNo),
	FOREIGN KEY (productID) REFERENCES product(productID),
	FOREIGN KEY (discountID, productID) REFERENCES offers(discountID, productID)
);
