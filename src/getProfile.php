<?php

    // Define your connection properties
    $servername  = "localhost";
    $dbname = "id15127113_learningpodsdb";
    $username = "id15127113_admin";
    $password = "Jefferson2020!!";

    // Create connection
    $con=mysqli_connect($servername,$username,$password,$dbname);
    
    if (mysqli_connect_errno())
   {
      echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
   }


    mysqli_query($con,"INSERT INTO People(LastName, FirstName, Birthday, ZipCode) 
	VALUES ('Kirton','Dakota','1994-01-10',48312)");
    
    $result = mysqli_query($con,"SELECT * FROM People;"); 
   while($row = mysqli_fetch_array($result))
   {
      echo $row['FirstName'] . " " . $row['LastName'];
      echo "<br>";
   }
    
   mysqli_close($con);
?>

