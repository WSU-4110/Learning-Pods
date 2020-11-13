<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
    include("config.php");
	
   
   
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(! $db ) {
		   die('Could not connect: ' . mysql_error());
		}
		
		
	   $fname = $_POST['FirstName'];
	   $lname = $_POST['LastName'];
	   $bday = $_POST['Birthday'];
	   $zcode = $_POST['ZipCode'];
	   $nkids = $_POST['NumKids'];
	   $host = $_POST['CanHost'];
	   $email = $_POST['Email'];
	   $userid = $_SESSION['login_id'];
		
		
		$sql1 = "INSERT INTO People (LastName,FirstName,Birthday, ZipCode, UserID) 
				VALUES('$lname','$fname', '$bday', $zcode, $userid)";
		
		if ($db->query($sql1) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql1 . "<br>" . $db->error;
		}
		
		$parentid = current(mysqli_query($db, "select PeopleID from People where UserID = $userid")->fetch_assoc());
		
		$sql2 = "INSERT INTO Parent (CanHost,Email,NumKids, ParentID) 
				VALUES('$host','$email', '$nkids', $parentid)";
		
		if ($db->query($sql2) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql2 . "<br>" . $db->error;
		}
	}
?>

<html lang="en">
    <head>
        <title>Edit Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="learningPods.css">

        <!-- Font-Icons for navbar -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
        </script>
        <![endif]-->
        <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

    </head>


    <body>
        <!-- LOGO -->
        <header>
            <div></div>
            <div>
                <h1>Logo</h1>
            </div>
            <div class="menu">
                <a href="javascript:void(0);" onclick="userSignedIn.openMenu()"  id="cacncel" style="display:none;"><i class="material-icons md-48" style="font-size: 28px;">close</i></a>
                <div id="myAccount">
                    <a href="logout.php" alt="logout">Logout</a>
                </div>
                <a href="javascript:void(0);" onclick="userSignedIn.openMenu()"  id="logout"><i class="material-icons md-48" style="font-size: 28px;">exit_to_app</i></a>
            </div>

        </header>

        <!-- NAV BAR -->
        <div class="navbar">
                <li><a href="index.php" class="active" alt="home"><i class="material-icons md-48">house</i></a></li>
                <li><a href="messages.php" alt="messages"><i class="material-icons md-48">mail</i></a></li>
                <li><a href="calendar.php" alt="calendar"><i class="material-icons md-48">insert_invitation</i></a></li>
                <li><a href="profileBuilderNav.php" alt="profile"><i class="material-icons md-48">face</i></a></li>
                <li><a href="resources.php" alt="resources"><i class="material-icons md-48">book</i></a></li>
                <li><a href="searchpods.php" alt="search group"><i class="material-icons md-48">search</i> </a></li>
        </div>

        <!-- MAIN BODY -->
		
        <div class="main">
            <div class="card">
                <div class="container">
            <h2>Parent Profile</h2><br><hr><br>
			<form action="<?php $_PHP_SELF ?>" method="post">
				<label for="FirstName">First name:</label><br>
				<input type="text" id="FirstName" name="FirstName" value="John"><br><br>
				<label for="LastName">Last name:</label><br>
				<input type="text" id="LastName" name="LastName" value="Doe"><br><br>
				<label for="Birthday">Birthday:</label><br>
  				<input type="date" id="Birthday" name="Birthday"><br><br>
				<label for="ZipCode">Zip Code:</label><br>
                <input type="text" id="ZipCode" name="ZipCode" value="48312"><br><br>
				<label for="NumKids">Number of Kids:</label><br>
                <input type="text" id="NumKids" name="NumKids" value="0"><br><br>
				<label for="CanHost">Can You Host? (Y or N):</label><br>
                <input type="text" id="CanHost" name="CanHost" value="Y"><br><br>
				<label for="Email">Email:</label><br>
                <input type="text" id="Email" name="Email" value="Y"><br><br>
                <input type="radio" name="Terms" required value="1"><label for="Terms"> I agree to <a href="policy.html">Privacy policy</a></label><br><br>
				<input type="submit" id="submit" class="button" value="Submit">
			</form>
                </div>
            </div>
        </div>

        <script src="logOutOption.js"></script>
        <script>
            var userSignedIn = new logOutOption();
        </script>
    </body>
 </html>















