select 
	PeopleID,
	FirstName,
	LastName,
	JoinDate,
	ZipCode,
	year(GetDate()) - year(birthday) as [Age]
from People;


select FirstName, LastName, Street
from People join HostHome
	on People.PeopleID = HostHome.ParentID;


select FirstName, LastName, Grade
from Child join People
on Child.ChildID = People.PeopleID
where Child.ParentID = (Select ParentID from Parent
						join People 
						on People.PeopleID = Parent.ParentID
						where LastName = 'Wagner');
