create database gymmanagementsystem;
use gymmanagementsystem;

select trainer.* from 
trainer left join customer on trainer.trainerID = customer.trainerID
group by customer.trainerID
having COUNT(customer.trainerID) < 3;

select * from customer;
select * from dietplan;
select * from membershipplan;
select * from loginauthentication;
select * from trainer;
select * from customerquery;


CREATE TABLE `loginauthentication` (
  `loginID` varchar(3) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`loginID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `customer` (
  `customerID` varchar(3) NOT NULL,
  `fName` varchar(15) DEFAULT NULL,
  `lName` varchar(15) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `dateJoined` date DEFAULT NULL,
  `phoneNo` varchar(13) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `CNIC` varchar(15) DEFAULT NULL,
  `trainerID` varchar(3) DEFAULT NULL,
  `membershipID` varchar(3) DEFAULT NULL,
  `dietID` varchar(3) DEFAULT NULL,
  `loginID` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`customerID`),
  KEY `trainerID` (`trainerID`),
  KEY `membershipID` (`membershipID`),
  KEY `dietID` (`dietID`),
  KEY `loginID` (`loginID`),
  CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`trainerID`) REFERENCES `trainer` (`trainerID`),
  CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`membershipID`) REFERENCES `membershipplan` (`membershipID`),
  CONSTRAINT `customer_ibfk_3` FOREIGN KEY (`dietID`) REFERENCES `dietplan` (`dietID`),
  CONSTRAINT `customer_ibfk_5` FOREIGN KEY (`loginID`) REFERENCES `loginauthentication` (`loginID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `customerquery` (
  `queryID` varchar(3) NOT NULL,
  `statement` varchar(100) DEFAULT NULL,
  `replyStatus` varchar(10) DEFAULT NULL,
  `reply` varchar(100) DEFAULT NULL,
  `queryDate` date DEFAULT NULL,
  `customerID` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`queryID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `customerquery_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `deposits` (
  `depositID` varchar(3) NOT NULL,
  `depositType` varchar(15) DEFAULT NULL,
  `depositDate` date DEFAULT NULL,
  `amountRecieved` double DEFAULT NULL,
  `amountRecievable` double DEFAULT NULL,
  `customerID` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`depositID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `deposits_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `dietplan` (
  `dietID` varchar(3) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `description` text,
  `trainerID` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`dietID`),
  KEY `trainerID` (`trainerID`),
  CONSTRAINT `dietplan_ibfk_1` FOREIGN KEY (`trainerID`) REFERENCES `trainer` (`trainerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `expense` (
  `expenseID` varchar(3) NOT NULL,
  `expenseType` varchar(15) DEFAULT NULL,
  `expenseDate` date DEFAULT NULL,
  `amountPaid` double DEFAULT NULL,
  `amountPayable` double DEFAULT NULL,
  `trainerID` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`expenseID`),
  KEY `trainerID` (`trainerID`),
  CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`trainerID`) REFERENCES `trainer` (`trainerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `membershipplan` (
  `membershipID` varchar(3) NOT NULL,
  `membershipName` varchar(20) DEFAULT NULL,
  `features` text,
  `planStatus` bit(1) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`membershipID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `trainer` (
  `trainerID` varchar(3) NOT NULL,
  `fName` varchar(15) DEFAULT NULL,
  `lName` varchar(15) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `dateJoined` date DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `experience` int DEFAULT NULL,
  `phoneNo` varchar(13) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `CNIC` varchar(15) DEFAULT NULL,
  `loginID` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`trainerID`),
  KEY `loginID` (`loginID`),
  CONSTRAINT `trainer_ibfk_1` FOREIGN KEY (`loginID`) REFERENCES `loginauthentication` (`loginID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 
insert into LoginAuthentication (loginID, email, password) values ("L01","abdullah12@gmail.com","123456");
insert into LoginAuthentication (loginID, email, password) values ("L02","azeem14@gmail.com","132546");
insert into LoginAuthentication (loginID, email, password) values ("L03","ali24@gmail.com","234561");
insert into LoginAuthentication (loginID, email, password) values ("L04","aliQaish1234@gmail.com","123456");
insert into LoginAuthentication (loginID, email, password) values ("L05","aliahmad24@gmail.com","23s4561");
insert into LoginAuthentication (loginID, email, password) values ("L06","azimamjad412@gmail.com","123456");
insert into LoginAuthentication (loginID, email, password) values ("L07","hanzla23@gmail.com","234561");
insert into LoginAuthentication (loginID, email, password) values ("L08","ahmedkhan@gmail.com","password");
insert into LoginAuthentication (loginID, email, password) values ("L09","usmanali@gmail.com","12345");
insert into LoginAuthentication (loginID, email, password) values ("L10","muhammadali@gmail.com","letmein");
insert into LoginAuthentication (loginID, email, password) values ("L11","tariqmehmood@gmail.com","sunshine");
insert into LoginAuthentication (loginID, email, password) values ("L12","faisalkhan@gmail.com","qwerty");
insert into LoginAuthentication (loginID, email, password) values ("L13","shahzadahmed@gmail.com","iloveyou");
insert into LoginAuthentication (loginID, email, password) values ("L14","waqasahmed@gmail.com","monkey");
insert into LoginAuthentication (loginID, email, password) values ("L15","umarfarooq@gmail.com","trustno1");
insert into LoginAuthentication (loginID, email, password) values ("L16","salmankhan@gmail.com","password1");
insert into LoginAuthentication (loginID, email, password) values ("L17","bashirahmed@gmail.com","123456789");
insert into LoginAuthentication (loginID, email, password) values ("L18","imranhussain@gmail.com","abc123");
insert into LoginAuthentication (loginID, email, password) values ("L19","nashitkhan@gmail.com","letmein1");
insert into LoginAuthentication (loginID, email, password) values ("L20","shahbazali@gmail.com","qazwsx");
insert into LoginAuthentication (loginID, email, password) values ("L21","asadmehmood@gmail.com","monkey1");
insert into LoginAuthentication (loginID, email, password) values ("L22","bilalahmed@gmail.com","password2");
insert into LoginAuthentication (loginID, email, password) values ("L23","hammadkhan@gmail.com","asdfgh");
insert into LoginAuthentication (loginID, email, password) values ("L24","tahirmehmood@gmail.com","qwerty1");
insert into LoginAuthentication (loginID, email, password) values ("L25","razaali@gmail.com","iloveyou1");
insert into LoginAuthentication (loginID, email, password) values ("L26","shoaibahmed@gmail.com","trustno2");
insert into LoginAuthentication (loginID, email, password) values ("L27","zahidhussain@gmail.com","abcdef");
insert into LoginAuthentication (loginID, email, password) values ("L28","sajidmehmood@gmail.com","123qwe");
insert into LoginAuthentication (loginID, email, password) values ("L29","shariqkhan@gmail.com","zxcvbn");
insert into LoginAuthentication (loginID, email, password) values ("L30","yasirhussain@gmail.com","iloveyou2");


select * from Trainer;

insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T01","Abdullah","Hashmi","2000-08-18","2022-12-25",20000,1,"0331-5256371","House 667, Askari 11, Lahore","42501-3436583-3","L01");	
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T02","Azeem","Amjad","2001-02-06","2020-02-01",30000,3,"0334-7524596","House 741, Model Town, Lahore","42212-4444497-5","L02");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T03","Ali","Khan","1999-05-03","2021-06-15",25000,5,"0321-4378492","House 987, DHA Phase 5, Lahore","42101-2225491-7","L03");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T04","Yasir","Hussain","1997-09-23","2019-07-10",35000,7,"0322-9876543","House 123, Cantt, Lahore","42301-5555591-3","L30");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T05","Shariq","Khan","1996-12-30","2018-05-12",40000,10,"0345-4567891","House 456, Johar Town, Lahore","42421-6666692-1","L29");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T06","Sajid","Mehmood","1995-06-07","2017-03-03",45000,2,"0336-7890123","House 789, Garden Town, Lahore","42512-7777797-6","L28");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T07","Zahid","Hussain","2001-03-03","2023-02-01",25000,4,"0322-3747382","House 159, Allama Iqbal Town, Lahore","42101-2225492-5","L27");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T08","Shoaib","Mughal","2002-07-12","2024-05-10",30000,6,"0345-4567892","House 357, Faisal Town, Lahore","42212-4444495-2","L26");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T09","Raza","Ali","2003-11-23","2025-07-07",35000,3,"0336-7890124","House 568, PECHS, Karachi","42301-5555590-6","L25");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T10","Tahir","Mehmood","1996-02-28","2026-09-03",40000,5,"0321-4378493","House 981, Gulberg, Lahore","42421-6666692-2","L24");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T11","Hammad","Khan","2005-05-07","2027-11-01",45000,8,"0322-9876544","House 147, Nazimabad, Karachi","42512-7777797-7","L23");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T12","Bilal","Ahmad","1992-08-18","2028-01-01",25000,2,"0331-5256372","House 256, DHA Phase 6, Lahore","42101-2225491-8","L22");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T13","Asad","Mehmood","1992-01-03","2029-03-15",30000,4,"0321-4378494","House 369, DHA Phase 7, Lahore","42212-4444497-6","L21");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T14","Shahbaz","Ali","1991-04-12","2030-05-10",35000,6,"0345-4567893","House 159, Clifton, Karachi","42301-5555591-4","L20");
insert into Trainer (trainerID,fName,lName, DOB,dateJoined,salary,experience,phoneNo,address,CNIC,loginID)
values ("T15","Nashit","Khan","1994-07-23","2031-07-07",40000,8,"0336-7890125","House 357, Garden Town, Lahore","42421-6666692-3","L19");



insert into membershipplan (membershipID,membershipName,features,planStatus,price)
values ("M01","Beginner","The plan allows for the use of selected equipment, a personal trainer and nutrition plans",1,2500);
insert into membershipplan (membershipID,membershipName,features,planStatus,price)
values ("M02","Standard","The plan allows for the use of all equipment, a personal trainer and nutrition plans and discounts on extended sessions",1,3500);
insert into membershipplan (membershipID,membershipName,features,planStatus,price)
values ("M03","Premium","The plan allows for the use of all equipment, unlimited training session and nutrition plans and discounts on special classes and access to steam room",1,3500);
select * from membershipPlan;


insert into Customer(customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,trainerID,membershipID,dietID,loginID) values ("C01","Ali","Qaish","2000-12-01","2022-12-31","0321-2325471","House no 4, street 60, DHA phase 5","42501-6567483-8","T01","M02","D01","L04");
insert into Customer(customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,trainerID,membershipID,dietID,loginID) values ("C02","Ali","Ahmad","2000-12-01","2022-12-31","0331-1212381","House no 5, street 20, DHA phase 6","42501-8387490-0","T01","M03","D01","L05");
insert into Customer(customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,trainerID,membershipID,dietID,loginID) values ("C03","Muhammad","Azim","2000-12-01","2022-12-31","0321-4345892","House no 2, street 22, DHA phase 5","42501-9097883-1","T01","M01","D01","L06");
INSERT INTO Customer (customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,trainerID,membershipID,dietID,loginID) VALUES ("C04", "Hanzla", "Ali", "1999-02-11", "2022-08-15", "0300-1234567", "House no 7, street 12, Lahore", "42101-1234567-8", "T02", "M03", "D03", "L07");
INSERT INTO Customer (customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,trainerID,membershipID,dietID,loginID) VALUES ("C05", "Ahmad", "Khan", "1999-05-29", "2022-07-01", "0321-9876543", "House no 45, street 18, Karachi", "42101-7654321-0", "T02", "M02", "D04", "L08");
INSERT INTO Customer (customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,trainerID,membershipID,dietID,loginID) VALUES ("C06", "Usman", "Ahmed", "1998-12-31", "2022-06-20", "0300-7890123", "House no 1, street 2, Rawalpindi", "42101-7890123-5", "T05", "M03", "D08", "L09");
INSERT INTO Customer (customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,trainerID,membershipID,dietID,loginID) VALUES ("C07", "Muhammad", "Ali", "1999-01-01", "2022-01-01", "0321-2468024", "House no 12, street 34, Lahore", "42101-2468024-1", "T06", "M01", "D09", "L10");
INSERT INTO Customer (customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,trainerID,membershipID,dietID,loginID) VALUES ("C08", "Tariq", "Mehmood", "1999-03-11", "2022-09-11", "0300-1357911", "House no 5, street 67, Karachi", "42101-1357911-6", "T07", "M02", "D10", "L11");
INSERT INTO Customer (customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,trainerID,membershipID,dietID,loginID) VALUES ("C09", "Faisal", "Khan", "1998-12-20", "2022-11-20", "0321-3691215", "House no 9, street 8, Rawalpindi", "42101-3691215-2", "T08", "M03", "D11", "L12");




INSERT INTO customerquery (queryID, statement, replyStatus, reply, queryDate, customerID)
VALUES 
	('Q01', 'Can you change my name?', 'NotReplied', null, '2022-01-02', 'C02'),
    ('Q02', 'Do you offer a loyalty program?', 'NotReplied', null, '2022-01-02', 'C01'),
    ('Q03', 'Do you have any promotions currently available?', 'Replied', 'Not really.', '2022-01-03', 'C01');


INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D01', 'Gaining', '3 eggs at breakfast with a peanut butter break and a glass of milk. Eat fruit after every 2 hours. AT lunch, eat ricee. Before going to gym eat 5 bananas. After workout, drink milk shake of banana with dry fuits. At Dinner, eat 250g boiled piece of meat', 'T01');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D02', 'Cutting', 'For breakfast, eat oatmeal with a scoop of protein powder. Snack on Greek yogurt and berries mid-morning. For lunch, eat a large salad with grilled chicken and avocado. In the afternoon, snack on a hard-boiled egg and an apple. For dinner, eat grilled salmon with roasted vegetables.', 'T01');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D03', 'Maintenance', 'For breakfast, eat 2 slices of whole grain bread with almond butter and a banana. Mid-morning, snack on a protein bar. For lunch, eat a turkey and cheese sandwich on whole grain bread with a side of carrots and hummus. In the afternoon, snack on a handful of almonds. For dinner, eat grilled chicken with a sweet potato and steamed broccoli.', 'T02');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D04', 'Gaining', 'For breakfast, eat a bowl of oatmeal with a scoop of protein powder and a small handful of raisins. Mid-morning, snack on a hard-boiled egg and an apple. For lunch, eat a turkey and cheese wrap with a side of fruit. In the afternoon, snack on a protein bar. For dinner, eat a large portion of pasta with meatballs and a side of garlic bread.', 'T02');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D05', 'Cutting', 'For breakfast, eat a bowl of Greek yogurt with a small handful of granola and berries. Mid-morning, snack on a small handful of almonds. For lunch, eat a grilled chicken salad with a variety of vegetables. In the afternoon, snack on a hard-boiled egg and an apple. For dinner, eat grilled salmon with a side of quinoa and steamed asparagus.', 'T03');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D06', 'Maintenance', 'For breakfast, eat 2 eggs scrambled with spinach and a slice of whole grain toast. Mid-morning, snack on Greek yogurt with a small handful of berries. For lunch, eat a turkey and cheese sandwich on whole grain bread with a side of carrot sticks. In the afternoon, snack on a protein bar. For dinner, eat grilled chicken with a baked sweet potato and steamed broccoli.', 'T02');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D07', 'Gaining', 'For breakfast, eat a bowl of oatmeal with a scoop of protein powder and a small handful of raisins. Mid-morning, snack on a hard-boiled egg and a banana. For lunch, eat a large portion of pasta with meatballs and a side of garlic bread. In the afternoon, snack on a protein bar. For dinner, eat a large portion of rice with grilled chicken and a side of steamed vegetables.', 'T04');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D08', 'Cutting', 'For breakfast, eat a bowl of Greek yogurt with a small handful of granola and berries. Mid-morning, snack on a small handful of almonds. For lunch, eat a grilled chicken salad with a variety of vegetables. In the afternoon, snack on a hard-boiled egg and an apple. For dinner, eat grilled salmon with a side of quinoa and steamed asparagus.', 'T05');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D09', 'Maintenance', 'For breakfast, eat 2 eggs scrambled with spinach and a slice of whole grain toast. Mid-morning, snack on Greek yogurt with a small handful of berries. For lunch, eat a turkey and cheese sandwich on whole grain bread with a side of carrot sticks. In the afternoon, snack on a protein bar. For dinner, eat grilled chicken with a baked sweet potato and steamed broccoli.', 'T06');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D10', 'Gaining', 'For breakfast, eat a bowl of oatmeal with a scoop of protein powder and a small handful of raisins. Mid-morning, snack on a hard-boiled egg and a banana. For lunch, eat a large portion of pasta with meatballs and a side of garlic bread. In the afternoon, snack on a protein bar. For dinner, eat a large portion of rice with grilled chicken and a side of steamed vegetables.', 'T07');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D11', 'Cutting', 'For breakfast, eat a bowl of Greek yogurt with a small handful of granola and berries. Mid-morning, snack on a small handful of almonds. For lunch, eat a grilled chicken salad with a variety of vegetables. In the afternoon, snack on a hard-boiled egg and an apple. For dinner, eat grilled salmon with a side of quinoa and steamed asparagus.', 'T08');	
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D12', 'Maintenance', 'For breakfast, eat 2 eggs scrambled with spinach and a slice of whole grain toast. Mid-morning, snack on Greek yogurt with a small handful of berries. For lunch, eat a turkey and cheese sandwich on whole grain bread with a side of carrot sticks. In the afternoon, snack on a protein bar. For dinner, eat grilled chicken with a baked sweet potato and steamed broccoli.', 'T09');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D13', 'Gaining', 'For breakfast, eat a bowl of oatmeal with a scoop of protein powder and a small handful of raisins. Mid-morning, snack on a hard-boiled egg and a banana. For lunch, eat a large portion of pasta with meatballs and a side of garlic bread. In the afternoon, snack on a protein bar. For dinner, eat a large portion of rice with grilled chicken and a side of steamed vegetables.', 'T10');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D14', 'Cutting', 'For breakfast, eat a bowl of Greek yogurt with a small handful of granola and berries. Mid-morning, snack on a small handful of almonds. For lunch, eat a grilled chicken salad with a variety of vegetables. In the afternoon, snack on a hard-boiled egg and an apple. For dinner, eat grilled salmon with a side of quinoa and steamed asparagus.', 'T11');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D15', 'Maintenance', 'For breakfast, eat 2 eggs scrambled with spinach and a slice of whole grain toast. Mid-morning, snack on Greek yogurt with a small handful of berries. For lunch, eat a turkey and cheese sandwich on whole grain bread with a side of carrot sticks. In the afternoon, snack on a protein bar. For dinner, eat grilled chicken with a baked sweet potato and steamed broccoli.', 'T04');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D16', 'Gaining', 'For breakfast, eat a bowl of oatmeal with a scoop of protein powder and a small handful of raisins. Mid-morning, snack on a hard-boiled egg and a banana. For lunch, eat a large portion of pasta with meatballs and a side of garlic bread. In the afternoon, snack on a protein bar. For dinner, eat a large portion of rice with grilled chicken and a side of steamed vegetables.', 'T14');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D17', 'Cutting', 'For breakfast, eat a bowl of Greek yogurt with a small handful of granola and berries. Mid-morning, snack on a small handful of almonds. For lunch, eat a grilled chicken salad with a variety of vegetables. In the afternoon, snack on a hard-boiled egg and an apple. For dinner, eat grilled salmon with a side of quinoa and steamed asparagus.', 'T12');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D18', 'Maintenance', 'For breakfast, eat 2 eggs scrambled with spinach and a slice of whole grain toast. Mid-morning, snack on Greek yogurt with a small handful of berries. For lunch, eat a turkey and cheese sandwich on whole grain bread with a side of carrot sticks. In the afternoon, snack on a protein bar. For dinner, eat grilled chicken with a baked sweet potato and steamed broccoli.', 'T13');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D19', 'Gaining', 'For breakfast, eat a bowl of oatmeal with a scoop of protein powder and a small handful of raisins. Mid-morning, snack on a hard-boiled egg and a banana. For lunch, eat a large portion of pasta with meatballs and a side of garlic bread. In the afternoon, snack on a protein bar. For dinner, eat a large portion of rice with grilled chicken and a side of steamed vegetables.', 'T14');
INSERT INTO dietplan (dietID, type, description, trainerID) VALUES ('D20', 'Cutting', 'For breakfast, eat a bowl of Greek yogurt with a small handful of granola and berries. Mid-morning, snack on a small handful of almonds. For lunch, eat a grilled chicken salad with a variety of vegetables. In the afternoon, snack on a hard-boiled egg and an apple. For dinner, eat grilled salmon with a side of quinoa and steamed asparagus.', 'T15');


select * from DietPlan



















    
select * from deposits
    
select expense.*,trainer.fName,trainer.lName from expense
join Trainer
On Trainer.trainerID = expense.trainerID
where trainer.trainerID like '%T03%';

select fName,lName from trainer 
where trainer.trainerID like '%T0%';

    
select * from membershipPlan 
order by membershipID desc limit 1;

UPDATE customer SET membershipID = "M01" WHERE customer.customerID = "C01";
UPDATE customer SET membershipID = "M01" WHERE customer.customerID = "C02";
UPDATE customer SET membershipID = "M03" WHERE customer.customerID = "C03";


select membershipplan.membershipID, membershipName,customer.customerID,customer.fName,customer.lName  from membershipplan
join customer 
on customer.membershipID = membershipplan.membershipID;

select membershipplan.membershipID, membershipName, count(customer.membershipID) as ActivePlanCount from membershipplan
join customer 
on customer.membershipID = membershipplan.membershipID
group by customer.membershipID
order by count(customer.membershipID) desc



delete from membershipplan
where membershipID = "M01" OR membershipID = "M02" OR membershipID = "M03";

DELETE FROM membershipplan
WHERE membershipID = "M01";

INSERT INTO `gymmanagementsystem`.`customer`
(`customerID`,
`fName`,
`lName`,
`DOB`,
`dateJoined`,
`phoneNo`,
`address`,
`CNIC`,
`weight`,
`trainerID`,
`membershipID`,
`dietID`,
`progressID`,
`loginID`)

select expense.*,trainer.trainerID,trainer.fName,trainer.lName from expense
join Trainer 
On Trainer.trainerID = expense.trainerID;

insert into Customer(customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,weight,trainerID,membershipID,dietID,progressID,loginID) 
values ("C01","Ali","Qaish","2000-12-01","2022-12-31","0321-2325471","House no 4, street 60, DHA phase 5","42501-6567483-8",60,"T01",null,null,null,"L04");
insert into Customer(customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,weight,trainerID,membershipID,dietID,progressID,loginID) 
values ("C02","Sabir","Raza","2000-12-01","2022-12-31","0331-1212381","House no 5, street 20, DHA phase 6","42501-8387490-0",150,"T02",null,null,null,"L05");
insert into Customer(customerID,fName,lName,DOB,dateJoined,phoneNo,address,CNIC,weight,trainerID,membershipID,dietID,progressID,loginID) 
values ("C03","Azeem","Muhammad","2000-12-01","2022-12-31","0321-4345892","House no 2, street 22, DHA phase 5","42501-9097883-1",70,"T03",null,null,null,"L06");

INSERT INTO customerquery (queryID, statement, replyStatus, reply, queryDate, customerID)
VALUES 
	('Q01', 'Can you change my name?', 'NotReplied', null, '2022-01-02', 'C02'),
    ('Q02', 'Do you offer a loyalty program?', 'NotReplied', null, '2022-01-02', 'C01'),
    ('Q03', 'Do you have any promotions currently available?', 'NotReplied', null, '2022-01-03', 'C01');


select customer.* from customer,customerquery
where customerquery.queryID = 'Q01';

SELECT customer.*
FROM customer
JOIN customerquery ON customer.customerID = customerquery.customerID
where customerquery.queryID = 'Q01';

select * from customerquery

select count(customerID) from customerquery 
where customerID = 'C01';


select * from Traineremail
where trainer.loginID = "L03"

update Trainer set trainer.loginID = "L03",trainer.fName = "Hadi",trainer.lName = "Hashmi"
where trainer.trainerID = "T03";

show columns from Trainer

show columns from customer;
show columns from customerquery;
show columns from deposits;
show columns from dietplan;
show columns from expense;
show columns from loginauthentication;
show columns from membershipplan;
show columns from progresstrack;
show columns from timeslot;
show columns from trainer;
show columns from trainerlot;