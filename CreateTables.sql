CREATE TABLE People (
	PeopleID int NOT NULL IDENTITY(1,1),
	LastName varchar(20),
	FirstName varchar(20),
	Birthday date,
	JoinDate date,
	ZipCode int,
	CONSTRAINT PK_People PRIMARY KEY (PeopleID) 
);


CREATE TABLE Parent (
	ParentID int,
	NumKids int,
	CanHost bit,
	Email varchar(25),
	CONSTRAINT FK_ParentID FOREIGN KEY (ParentID)
    REFERENCES People(PeopleID) ON UPDATE  NO ACTION  ON DELETE  CASCADE
);

Create Table Child (
	ChildID int,
	Grade int,
	ParentID int,
	CONSTRAINT FK_ChildID FOREIGN KEY (ChildID)
    REFERENCES People(PeopleID) ON UPDATE  NO ACTION  ON DELETE  CASCADE,
	CONSTRAINT FK_ParentID_Child FOREIGN KEY (ParentID)
    REFERENCES People(PeopleID) ON UPDATE  NO ACTION  ON DELETE  NO ACTION
);