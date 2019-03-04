delimiter //
create or replace function monthly_profit (department_name varchar(20), m int)
returns decimal(24 , 2) deterministic
begin
    
    set @ans = (select SUM(quantitySold * (MRP - costPrice))
                from sales natural join bill natural join product 
                where extract(month from billDate) = m and departmentName = department_name);

    return @ans;

end //

delimiter ;