set role admin;

insert into department values 
    ("Food Section" , 10000 , 2),
    ("Household" , 10001 , 3),
    ("Electronics" , 10002 , 4),
    ("Sports" , 10003 , 5),
    ("Clothes" , 10004 , 1),
    ("Manager" , 10010 , 1);


insert into product values    
    (1000 , "Biscuits" , "Britania" , "Food Section" , 15.00 , 20.00 , 100   ),
    (1001 , "Maggi" , "parle" , "Food Section" , 17.00 , 23.00 , 100   ),
    (2000 , "Surf Excel" , "Rin" , "Household" , 30.00 , 60.00 , 200   ),
    (2001 , "Tooth paste" , "Colgate" , "Household" , 25.00 , 30.00 , 100   ),
    (3000 , "Trimmer" , "Philips" , "Electronics" , 800.00 , 1099.00 , 20   ),
    (3001 , "Iron" , "Usha" , "Electronics" , 1000.00 , 1220.00 , 20   ),
    (4000 , "Racket" , "Yonex" , "Sports" , 1200.00 , 1700.00 , 5   ),
    (4001 , "Volley ball" , "Nivea" , "Sports" , 600.00 , 800.00 , 100   ),
    (5000 , "Tshirts" , "Denim" , "Clothes" , 1200.00 , 2000.00 , 10   ),
    (5001 , "Jeans" , "Killer" , "Clothes" , 2700.00 , 3500.00 , 10   ),
	(5002 , "Trousers", "BB"	, "Clothes", 4000.00, 5500.00, 0);

-- update foodSection set 
--     (1000 , '2018-11-10' , '2019-12-31' , "100 gm"),
--     (1001 , '2018-07-10' , '2020-12-31' , "200 gm");

-- update household set
--     (2000 , '1/2 kg' , 'Detergent'),
--     (2001 , '200 gm' , 'Tooth paste');

-- update electronics set
--     (3000 , 5 , '2 year' , "Use for trimming"),
--     (3001 , 4 , '1/2 year' , "use for iron");

-- update sports set
--     (4000 , '1 year' ,'Yonex racket light weight' , "Badminton"),
--     (4001 , '1/2 year' , 'Nivea balls'  , "Vollyball");


-- update clothes set
--     (5000 , 'Tshirt' ,'XL' , "AllTime"),
--     (5001 , 'Jeans' , 'XL'  , "AllTime"),
-- 	(5002 , 'Trousers', 'M', "Summer Wear");

insert into supplier values
    (2000 , "Shakti" , 8281112720 , 'West bengal' , 'shakti@gmail.com' ),
    (3008 , "Yonex" , 8281112721 , 'Kerala' , 'yo@gmail.com' ),
	(5001,  "BlackBerry", 9048451650, 'US', 'info@bb.com');
    

insert into ordered values
    (1000 , 2000 , 1001 , '2019-01-01' , 100),
    (1003 , 3008 , 4000 , '2018-12-01' , 10),
	(5004 , 5001 , 5002, '2019-02-04', 10);

insert into supplied values
    (1100 , 1000 , '2019-01-26' , 80),
    (1101 , 1003 , '2019-01-24' , 10);


insert into employee values
    (100000 , "Dharma kunwara" , "1992-06-23" , 8281112729 , "Rajasthan" , 'dharma@gmail.com' , '2001-01-01' , 100 , 'Household'  ),
    (200000 , "Saptdeep awara" , "1996-06-24" , 8281112291 , "bengal" , 'saptdepp@gmail.com' , '2011-01-01' , 100 , 'Sports'  );

insert into discount values
    (80000 , 100 , 20.00 , '2019-12-01' , "By company" , "By company"),
    (80020 , 1000 , 18.00 , '2019-02-05' , "By market" , "Always applied"),
	(80005 , 500, 	10, 	'2019-02-03' , "Bumper Offer", "Discount of 10% upto 500Rs"),
	(80006 , 500, 	12, 	'2019-02-04' , "Bumper Offer", "Discount of 12% upto 500Rs");

insert into offers values
    (80000 ,  1000),
    (80020 ,  4001),
	(80005 ,  5000),
	(80006 ,  5001);

insert into customer values
    (100010100 , "Saurabh" , 181112725 , "Punjab" , "saurabh@gmail.com" , '2016-01-12' , 100000.00 ),
    (100010101 , "gopal" , 181112715 , "up" , "gopi@gmail.com" , '2016-11-12' , 100000.00 );

insert into bill values
    ( 11111111111 , '2019-01-28' , 100010100 , 50000.00 ),
    ( 11111110011 , '2019-01-25' , 100010100 , 25000.00 );

insert into sales values 
    (11111111111 , 1000 , 80000 , 10),
    (11111110011 , 4001 , 80020 , 12);

