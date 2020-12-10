<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(!isset($_SESSION['login_user'])){
		header('Location: login.php');
		exit();
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
	   $grade = $_POST['Grade'];
	   $userid = $_SESSION['login_id'];
		
       

		$sql1 = "INSERT INTO People (LastName,FirstName,Birthday, ZipCode, UserID, P_ID) 
				VALUES('$lname','$fname', '$bday', $zcode, $userid, 0)";
		
		if ($db->query($sql1) === TRUE) {
			//echo "New record created successfully";
		} else {
			echo "Error: " . $sql1 . "<br>" . $db->error;
		}
		
		$userid = $_SESSION['login_id'];
		$parentid = current(mysqli_query($db, "select PeopleID from People where UserID = $userid")->fetch_assoc());
		$childid = current(mysqli_query($db, "select PeopleID from People where FirstName like '$fname' and LastName like '$lname'")->fetch_assoc());
		
		$sql2 = "INSERT INTO Child (ChildID,Grade,ParentID) 
				VALUES($childid,'$grade', $parentid)";
		
		if ($db->query($sql2) === TRUE) {
			//echo "New record created successfully";
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
            <div id="logo" align="center">
                <img height="72px" id="desktop" src="images/pods-logoW.png">
                <!-- <img height="72px" id="mobile" src="images/pods-icon.png"> -->
            </div>
            <div class="menu">
                <a href="javascript:void(0);" onclick="openMenu()"  id="cacncel" style="display:none;"><i class="material-icons md-48" style="font-size: 28px;">close</i></a>
                <div id="myAccount">
                    <a href="logout.php" alt="logout"> Logout </a>
                </div>
                <a href="javascript:void(0);" onclick="openMenu()"  id="logout"><i class="material-icons md-48" style="font-size: 28px;">exit_to_app</i></a>
            </div>

        </header>

        <!-- NAV BAR -->
        <div class="navbar">
                <li><a href="index.php"alt="home"><i class="material-icons md-48">house</i></a></li>
                <li><a href="messages.php" alt="messages"><i class="material-icons md-48">mail</i></a></li>
                <li><a href="calendar.php" alt="calendar"><i class="material-icons md-48">insert_invitation</i></a></li>
                <li><a href="profileBuilderNav.php" class="active" alt="profile"><i class="material-icons md-48">face</i></a></li>
                <li><a href="resources.php" alt="resources"><i class="material-icons md-48">book</i></a></li>
                <li><a href="searchpods.php" alt="search group"><i class="material-icons md-48">search</i> </a></li>
        </div>

        <!-- MAIN BODY -->
		
        <div class="main">
            <div class="card">
                <div class="container">
            <h2>Add Child</h2><br><hr><br>
			<form action="<?php $_PHP_SELF ?>" method="post">
				<label for="FirstName">First name:</label><br>
				<input type="text" id="FirstName" name="FirstName" placeholder="John" required><br><br>
				<label for="LastName">Last name:</label><br>
				<input type="text" id="LastName" name="LastName" placeholder="Doe" required><br><br>
				<label for="Birthday">Birthday:</label><br>
                <input type="date" id="Birthday" name="Birthday" max="2016-01-01" min="2004-01-01" required><br><br>
				<!-- <label for="ZipCode">Zip Code:</label><br>
                <input type="text" id="ZipCode" name="ZipCode" value="48312"><br><br>
				<label for="Grade">Grade Level(1-12):</label><br>
                <input type="text" id="Grade" name="Grade" value="1"><br><br> -->
                <label for="ZipCode">Zip Code (48000 - 48970):</label><br>
                <input type="number" id="ZipCode" name="ZipCode" min="48000" max="48972" placeholder="48###" required>
                <!-- minlength="5" maxlength="5" pattern="[0-9]*" value="48312"> -->
                </select><br>
				<label for="Grade">Grade Level(1-12):</label><br>
                <select name="Grade" id="Grade">
                    <option value="0"> K </option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                    <option value="4"> 4 </option>
                    <option value="5"> 5 </option>
                    <option value="6"> 6 </option>
                    <option value="7"> 7 </option>
                    <option value="8"> 8 </option>
                    <option value="9"> 9 </option>
                    <option value="10"> 10 </option>
                    <option value="11"> 11 </option>
                    <option value="12"> 12 </option>
                </select><br><br>
                <input type="radio" name="Terms" required value="1"><label for="Terms"> I agree to <a href="policy.html">Privacy policy</a></label><br><br>
				<input type="submit" id="submit" name="submit" class="button" value="Submit">
			</form>
                </div>
            </div>
            <?php 


                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    echo '<div class="card">';
                    echo '<div class="container">';
                    
                    $zip = $_POST['ZipCode'];
                    $grd = $_POST['Grade'];
                    $location = $zip;
                    
                    $checkZip = "SELECT SchoolName FROM School WHERE SchoolZipCode =  $zip";
                    $resultSetSchool = $db->query($checkZip);
                    if ($resultSetSchool->num_rows < 1){
                        $sqlCity = "SELECT DISTINCT City FROM ZipCode WHERE ZipCodeID LIKE $zip";

                        $result = mysqli_query($db, $sqlCity);
                        $resltt = mysqli_fetch_assoc($result);
                        $selCity = $resltt['City'];
                        $location = $selCity;
                        
                        $sqlCitySearch = "SELECT SchoolName, MinGrade, MaxGrade FROM School WHERE SchoolCity LIKE '$selCity' AND MaxGrade >= $grd AND MinGrade <= $grd";
                        $resultSetSchool = $db->query($sqlCitySearch);
                        
                    }
                    else {
                        $sqlZipSearch = "SELECT SchoolName, MinGrade, MaxGrade FROM School WHERE SchoolZipCode =  $zip AND MaxGrade >= $grd AND MinGrade <= $grd";
                        $resultSetSchool = $db->query($sqlZipSearch);

                    }
                    echo '<h3>Schools Found in '. ucwords(strtolower($location)) .'</h3><hr>';
                    echo '<label for="school" id="school">School Name</label><br>';
                    echo '<select name="school">';
                    
                    if ($resultSetSchool->num_rows > 0){
                        echo 'Schools found <br>';
                    while ($row = $resultSetSchool->fetch_assoc()){
                        echo "<option value=' ". $row['SchoolName']. "'>" . $row['SchoolName'] . " </option>";
                        }
                    }
                    else echo "No schools";
                    echo '</div>';
                    echo '</div>';
                }

            ?>

        </div>

        <script>
            function openMenu() {
                var menuTab = document.getElementById("myAccount");
                if (menuTab.style.display == "block"){
                    cacncel.style.display = "none"; 
                    logout.style.display = "block";
                    menuTab.style.display = "none"; 
                }
                else { 
                    cacncel.style.display = "block";
                    logout.style.display = "none";
                    menuTab.style.display = "block";
                }   
            }

            
        </script>
    </body>
 </html>















