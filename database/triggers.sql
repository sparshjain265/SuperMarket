-- This file contains all the triggers in the super market 
delimiter //

create or replace trigger manage_product
before update on product
for each row 
begin 
    set @currentRole = (select current_role());
    set @dept = (select departmentName from product where productID = NEW.productID);

    if(@currentRole <> 'admin') then
        if (@currentRole <> 'foodManager' and @dept = 'Food Section') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'householdManager' and @dept = 'Household') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'sportsManager' and @dept = 'Sports') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'electronicsManager' and @dept = 'Electronics') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'clothesManager' and @dept = 'Clothes') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        end if;
    end if;
end //

create or replace trigger product_dept 
after insert on product
for each row
begin

    if (NEW.departmentName = "Food Section" ) then
        insert into foodSection (productID , expiryDate) values (NEW.productID , curdate());
    elseif (NEW.departmentName = "Household" ) then
        insert into household (productID) values (NEW.productID);
    elseif (NEW.departmentName = "Electronics" ) then
        insert into electronics (productID) values (NEW.productID);
    elseif (NEW.departmentName = "Sports" ) then
        insert into  sports(productID) values (NEW.productID);
    elseif (NEW.departmentName = "Clothes" ) then
        insert into clothes(productID) values (NEW.productID);
    else 
        SIGNAL SQLSTATE "45001"
        set MESSAGE_TEXT = "Illegal department name!";
    end if;
end //


create or replace trigger manage_offer
before insert on offers
for each row 
begin 
    set @currentRole = (select current_role());
    set @dept = (select departmentName from product where productID = NEW.productID);

    if(@currentRole <> 'admin') then
        if (@currentRole <> 'foodManager' and @dept = 'Food Section') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'householdManager' and @dept = 'Household') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'sportsManager' and @dept = 'Sports') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'electronicsManager' and @dept = 'Electronics') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'clothesManager' and @dept = 'Clothes') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        end if;
    end if;
end //


create or replace trigger manage_order
before insert on ordered
for each row 
begin 
    set @currentRole = (select current_role());
    set @dept = (select departmentName from product where productID = NEW.productID);

    if(@currentRole <> 'admin') then
        if (@currentRole <> 'foodManager' and @dept = 'Food Section') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'householdManager' and @dept = 'Household') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'sportsManager' and @dept = 'Sports') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'electronicsManager' and @dept = 'Electronics') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'clothesManager' and @dept = 'Clothes') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        end if;
    end if;
end //


create or replace trigger manage_vacancy
before update on department
for each row 
begin 
    set @currentRole = (select current_role());
    set @dept = NEW.departmentName;

    if(@currentRole <> 'admin') then
        if (@currentRole <> 'foodManager' and @dept = 'Food Section') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'householdManager' and @dept = 'Household') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'sportsManager' and @dept = 'Sports') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'electronicsManager' and @dept = 'Electronics') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'clothesManager' and @dept = 'Clothes') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'cashManager' and @dept = 'Cash') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        end if;
    end if;
end //


create or replace trigger manage_supply
before insert on supplied
for each row 
begin 
    set @currentRole = (select current_role());
    set @dept = (select departmentName from ordered natural join supplied natural join product where supplyID = NEW.supplyID);

    if(@currentRole <> 'admin') then
        if (@currentRole <> 'foodManager' and @dept = 'Food Section') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'householdManager' and @dept = 'Household') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'sportsManager' and @dept = 'Sports') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'electronicsManager' and @dept = 'Electronics') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        elseif (@currentRole <> 'clothesManager' and @dept = 'Clothes') then
            SIGNAL SQLSTATE "45002"
            set MESSAGE_TEXT = "Unauthorized access!";
        end if;
    end if;

    set @alreadySupplied = (select sum(quantitySupplied) from supplied group by orderID having orderID = NEW.orderID);
    if(isNULL(@alreadySupplied)) then
        set @alreadySupplied = 0;
    end if;

    set @quantityOrdered = (select quantityOrdered from ordered where orderID = NEW.orderID);
    if(isNULL(@quantityOrdered)) then
        set @quantityOrdered = 0;
    end if;

    if(NEW.quantitySupplied > (@quantityOrdered - @alreadySupplied)) then
        SIGNAL SQLSTATE "45004"
        set MESSAGE_TEXT = "Fraudulent Supply! Exceeds ordered quantity!";
    else
        set @productID = (select productID from ordered where orderID = NEW.orderID);
        update product set quantityStock = quantityStock + NEW.quantitySupplied where productID = (@productID);
    end if;

end //


create or replace trigger sales_consistency
before insert on sales
for each row
begin
    set @quantityAvailable = (select quantityStock from product where productID = NEW.productID);
    set @validity = (select validUpto from discount where discountID = NEW.discountID);
    set @billDate = (select billDate from bill where billNo = NEW.billNo);
    if(NEW.quantitySold > @quantityAvailable) then
        SIGNAL SQLSTATE "45003"
        set MESSAGE_TEXT = "Insufficient Quantity!";
    elseif(@billDate > @validity) then
        SIGNAL SQLSTATE "45004"
        set MESSAGE_TEXT = "Discount Expired!";
    else
        -- get the discount
        set @MRP = (select MRP from product where productID = NEW.productID);
        set @discount = 0;
        if(isNULL(NEW.discountID)) then
            set @discount = 0;
        else 
            set @discountPercent = (select discountPercent from discount where discountID = NEW.discountID);
            set @discountAmount = (select amount from discount where discountID = NEW.discountID);

            if(isNULL(@discountAmount)) then
                set @discountAmount = 0;
            end if;

            if(isNULL(@discountPercent)) then
                set @discountPercent = 0;
            end if;

            if(@discountAmount < (@MRP * @discountPercent * 0.01)) then
                set @discount = @discountAmount;
            else
                set @discount = @MRP * @discountPercent * 0.01;
            end if;    
        end if;
    end if;
    
    update bill set amount = amount + NEW.quantitySold * (@MRP - @discount) where billNo = NEW.billNo;
    update product set quantityStock = quantityStock - NEW.quantitySold where productID = NEW.productID;

end //


create or replace trigger update_customer_value
after update on bill
for each row
begin
    update customer set moneySpent = moneySpent + NEW.amount where customerID = NEW.customerID;
end //

delimiter ; 
