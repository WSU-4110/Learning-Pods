select 
	PeopleID,
	FirstName,
	LastName,
	JoinDate,
	ZipCode,
	year(GetDate()) - year(birthday) as [Age]
from People;