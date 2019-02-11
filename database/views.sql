
-- views for department employees

create view foodDetails as 
select *
from product natural join foodSection;

create view electronicsDetails as 
select *
from product natural join electronics;

create view householdDetails as 
select *
from product natural join household;

create view sportsDetails as 
select *
from product natural join sports;

create view clothesDetails as 
select *
from product natural join clothes;

-- views for customer

create view viewFood as
select productID, productName, brandName, MRP, manufactureDate, expiryDate, quantity
from foodDetails
where quantityStock > 0;

create view viewElectronics as
select productID, productName, brandName, MRP, powerRating, warranty, details
from electronicsDetails
where quantityStock > 0;

create view viewHousehold as
select productID, productName, brandName, MRP, quantity, category
from householdDetails
where quantityStock > 0;

create view viewSports as
select productID, productName, brandName, MRP, warranty, details, category
from sportsDetails
where quantityStock > 0;

create view viewClothes as
select productID, productName, brandName, MRP, category, size, season
from clothesDetails
where quantityStock > 0;

create view viewProducts as 
select productID, productName, brandName, MRP
from product
where quantityStock > 0;

-- view to show all available discounts to customer
create view viewDiscounts as
select productID, productName, brandName, discountID, amount, discountPercent, MRP, validUpto, details, termsAndConditions
from discount natural join offers natural join product
where quantityStock > 0 and validUpto >= (select curdate());

-- view for cashier to see customer history
-- create view customerHistory as 
-- select customerID , customerName , billNo , billDate , amount
-- from customer natural join bill;

-- view for managers

create view productFood as 
select * 
from product
where departmentName = 'Food Section';

create view productHousehold as 
select * 
from product
where departmentName = 'Household';

create view productSports as 
select * 
from product
where departmentName = 'Sports';

create view productElectronics as 
select * 
from product
where departmentName = 'Electronics';

create view productClothes as 
select * 
from product
where departmentName = 'Clothes';

create view employeeFood as 
select * 
from employee
where departmentName = 'Food Section';

create view employeeHousehold as 
select * 
from employee
where departmentName = 'Household';

create view employeeSports as 
select * 
from employee
where departmentName = 'Sports';

create view employeeElectronics as 
select * 
from employee
where departmentName = 'Electronics';

create view employeeClothes as 
select * 
from employee
where departmentName = 'Clothes';

create view employeeCashier as
select *
from employee
where departmentName = 'Cashier';



