-- This file contains all the triggers in the super market 
delimiter //

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
end //

delimiter ; 
