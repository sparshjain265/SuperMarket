delimiter //
create or replace function monthly_profit (department_name varchar(20), m int, y int)
returns decimal(24 , 2) deterministic
begin

    set @diff = (select SUM(quantitySold * (MRP - costPrice))
                from sales natural join bill natural join product
                where extract(month from billDate) = m and extract(year from billDate) = y and departmentName = department_name);
    set @d1 = 
    (with C as
    (with B as
    (with A as
    (select * from sales where not(isNull(discountID)))
    select billNo, discountID, quantitySold, MRP from A natural join product
    where departmentName = department_name)
    select billNo, quantitySold, amount as d1, discountPercent * MRP * 0.01 as d2 
    from B natural join discount)
    select sum(quantitySold * d1) from C natural join bill
    where extract(month from billDate) = m and extract(year from billDate) = y and d1 <= d2);

    if(isNull(@d1)) then
        set @d1 = 0;
    end if;

    set @d2 = 
    (with C as
    (with B as
    (with A as
    (select * from sales where not(isNull(discountID)))
    select billNo, discountID, quantitySold, MRP from A natural join product
    where departmentName = department_name)
    select billNo, quantitySold, amount as d1, discountPercent * MRP * 0.01 as d2 
    from B natural join discount)
    select sum(quantitySold * d2) from C natural join bill
    where extract(month from billDate) = m and extract(year from billDate) = y and d1 > d2);

    if(isNull(@d2)) then
        set @d2 = 0;
    end if;

    return @diff - (@d1 + @d2);

end //

create or replace procedure criticalProduct (in department_name varchar(20), in criticalQuantity int)
begin
    select * from product where quantityStock <= criticalQuantity and departmentName = department_name;
end //

create or replace procedure customerOfTheMonth (in mon int, in y int) 
begin

    with B as
    (with A as 
    (select customerID, sum(amount) as s from bill 
    where extract(month from billDate) = mon and extract(year from billDate) = y
    group by customerID)
    select *, max(s) as m from A)
    select customerID, customerName, s as This_Month_Max, phoneNo, customerAddress, emailID, joinDate, moneySpent as Total_Money_Spent
    from B natural join customer where s = m;

end //

create or replace procedure bestCustomer ()
begin

    select *, max(moneySpent) from customer;

end //

create or replace procedure unfulfilledOrders()
begin

    with A as
    (select orderID, SUM(quantitySupplied) as quantitySupplied from supplied group by orderID)
    select ordered.orderID, supplierID, productID, quantityOrdered, quantitySupplied, orderDate, datediff(curdate(), orderDate) as Days_Passed
    from ordered left join A on ordered.orderID = A.orderID where quantitySupplied < quantityOrdered;

end//

create or replace procedure getDiscounts(in pid int)
begin
    select * from viewDiscounts where productID = pid;
end//

delimiter ;
