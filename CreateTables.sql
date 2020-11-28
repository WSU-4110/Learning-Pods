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

CREATE TABLE HostHome (
	HomeID int NOT NULL IDENTITY(1,1),
	ParentID int,
	Street varchar(25),
	AptNumber varchar(25),
	City varchar(25),
	StateAbr varchar(2),
	CONSTRAINT FK_ParentID_Home FOREIGN KEY (ParentID)
    REFERENCES People(PeopleID) ON UPDATE  NO ACTION  ON DELETE  NO ACTION
);

Create Table School (
	SchoolID BIGINT NOT NULL,
	MinGrade INT NOT NULL,
	MaxGrade INT NOT NULL,
	SchoolName VARCHAR(60) NOT NULL,
	SchoolCity VARCHAR(60) NOT NULL,
	SchoolZipCode INT NOT NULL,

	CONSTRAINT PK_School PRIMARY KEY (SchoolID)
);

ALTER TABLE HostHome
ADD CONSTRAINT PK_Home PRIMARY KEY (HomeID);
