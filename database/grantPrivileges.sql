-- admin
grant all privileges on superMarket.* to admin with grant option;

-- common to all managers
grant select on bill to foodManager, householdManager, sportsManager, electronicsManager, clothesManager;
grant select on customer to foodManager, householdManager, sportsManager, electronicsManager, clothesManager;
grant all privileges on discount to foodManager, householdManager, sportsManager, electronicsManager, clothesManager;
grant all privileges on offers to foodManager, householdManager, sportsManager, electronicsManager, clothesManager; --needs trigger
grant all privileges on ordered to foodManager, householdManager, sportsManager, electronicsManager, clothesManager; --needs trigger
grant select on department to foodManager, householdManager, sportsManager, electronicsManager, clothesManager; 
grant update (vacancy) on department to foodManager, householdManager, sportsManager, electronicsManager, clothesManager; --needs trigger
grant select on sales to foodManager, householdManager, sportsManager, electronicsManager, clothesManager; --needs trigger
grant all privileges on supplier to foodManager, householdManager, sportsManager, electronicsManager, clothesManager; 
grant all privileges on supllied to foodManager, householdManager, sportsManager, electronicsManager, clothesManager; --needs trigger

-- cash manager
grant cashier to cashManager with admin option;
grant select on department to cashManager;
grant update (vacancy) on department to cashManager;
grant all privileges on employeeCashier to cashManager;

-- food manager
grant foodEmployee to foodManager with admin option;
grant all privileges on foodSection to foodManager;
grant all privileges on productFood to foodManager;
grant all privileges on employeeFood to foodManager;

-- household manager
grant householdEmployee to householdManager with admin option;
grant all privileges on householdSection to householdManager;
grant all privileges on productHousehold to householdManager;
grant all privileges on employeeHousehold to householdManager;

-- sports manager
grant sportsEmployee to sportsManager with admin option;
grant all privileges on sportsSection to sportsManager;
grant all privileges on productSports to sportsManager;
grant all privileges on employeeSports to sportsManager;

-- electronics manager
grant electronicsEmployee to electronicsManager with admin option;
grant all privileges on electronicsSection to electronicsManager;
grant all privileges on productSports to electronicsManager;
grant all privileges on employeeSports to electronicsManager;

-- clothes manager
grant clothesEmployee to clothesManager with admin option;
grant all privileges on clothesSection to foodManager;
grant all privileges on productClothes to clothesManager;
grant all privileges on employeeClothes to clothesManager;

-- common to all employees
grant customer to foodEmployee, householdEmployee, sportsEmployee, electronicsEmployee, clothesEmployee;
grant select on discount to foodEmployee, householdEmployee, sportsEmployee, electronicsEmployee, clothesEmployee;
grant select on offers to foodEmployee, householdEmployee, sportsEmployee, electronicsEmployee, clothesEmployee;

-- department wise
grant select on foodDetails to foodEmployee;
grant select on householdDetails to householdEmployee;
grant select on sportsDetails to sportsEmployee;
grant select on electronicsDetails to electronicsEmployee;
grant select on clothesDetails to clothesEmployee;

-- cashier
grant customer to cashier with admin option;
grant select on product to cashier;
grant update (quantityStock) on product to cashier;
grant select on discount to cashier;
grant select on offers to cashier;
grant select on viewDiscounts to cashier;
grant all privileges on sales to cashier;
grant select on bill to cashier;
grant insert on bill to cashier;
grant update (amount) on bill to cashier;
grant select on customer to cashier;
grant insert on customer to cashier;
grant update on customer to cashier;

-- customer
grant select on viewFood to customer;
grant select on viewHousehold to customer;
grant select on viewSports to customer;
grant select on viewElectronics to customer;
grant select on viewClothes to customer;
grant select on viewProducts to customer;
grant select on viewDiscounts to customer;
