Insert into People (LastName, FirstName, Birthday, JoinDate, ZipCode)
Values ('Kirton', 'Dakota', '01/10/1994', '10/07/2020', 48312);

Insert into People (LastName, FirstName, Birthday, JoinDate, ZipCode)
Values 
('Wagner', 'Eugene', '10/01/1955', '10/07/2020', 48312),
('Bell', 'Barabara', '10/06/1967', '10/07/2020', 48312),
('Andreas', 'Richard', '09/17/1970', '10/07/2020', 48312),
('Joyner', 'Lester', '02/20/1962', '10/07/2020', 48312),
('Bell', 'Danielle', '05/23/2005', '10/07/2020', 48312),
('Wagner', 'Jack', '11/16/2009', '10/07/2020', 48312),
('Joyner', 'Michael', '12/12/2010', '10/07/2020', 48312);

Insert into Parent (ParentID, NumKids, CanHost, Email) 
Values 
(2, 1, 1, 'wagner55@aol.com'),
(3, 2, 1, 'bell67@yahoo.com'),
(4, 3, 0, 'richard.andres@gmail.com'),
(5, 1, 1, 'lesterthejoyner@gmail.com');


Insert into Child (ChildID, Grade, ParentID) 
Values 
(6, 10, 3),
(7, 7, 2),
(8, 6, 5);

Insert into HostHome (ParentID, Street, AptNumber, City, StateAbr)
Values
(2, 'wagner road', NULL, 'Sterling Heights', 'MI'),
(3, 'bell lane', '2201', 'Sterling Heights', 'MI'),
(5, 'lester avenue', NULL, 'Sterling Heights', 'MI');


Insert into School (SchoolName, Street, City, StateAbr, ZipCode)
values
('Sterling Heights Elem','5534 Dodge Park','Sterling Heights','MI',48312),
('Sterling Heights Midd',' 8983 16 Mile','Sterling Heights','MI',48312),
('Sterling Heights High',' 9874 Hayes Rd','Sterling Heights','MI',48312);
