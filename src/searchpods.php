<?php
    if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(!isset($_SESSION['login_user'])){
		header('Location: login.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Find Nearby Pods</title>
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
                <li><a href="index.php" alt="home"><i class="material-icons md-48">house</i></a></li>
                <li><a href="messages.php" alt="messages"><i class="material-icons md-48">mail</i></a></li>
                <li><a href="calendar.php" alt="calendar"><i class="material-icons md-48">insert_invitation</i></a></li>
                <li><a href="profileBuilderNav.php" alt="profile"><i class="material-icons md-48">face</i></a></li>
                <li><a href="resources.php" alt="resources"><i class="material-icons md-48">book</i></a></li>
                <li><a href="searchpods.php" class="active" alt="search group"><i class="material-icons md-48">search</i> </a></li>
        </div>
		
		
    <!-- MAIN BODY -->
    <div class="main">
          <div class="card"> 
            <div class="container">
              <!--<div class="topnav">--> <!--What is this? not defined anywhere-->
                <h2>Search Pods</h2><br><hr><br>
				
				<form action="<?php $_PHP_SELF ?>" method="post">
				<label for="SearchZip">Enter Zip Code to Search:</label><br>
                <input type="number" id="SearchZip" name="SearchZip" min="48000" max="49970" placeholder="48000" required><br><br>
                <input type="radio" name="Terms" required value="1"><label for="Terms"> I aggree to <a href="policy.html">Privacy policy</a></label><br><br>
				<input type="submit" id="submit" class="button" value="Submit">
			</form>
			</div>
        </div>
			
        <?php
            include("config.php");

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                echo '<div class="card">';
                echo '<div class="container">';
            
                if(! $db ) {
                    die('Could not connect: ' . mysql_error());
                }
                
                $zip = $_POST['SearchZip'];
                
                $sql = "select FirstName, LastName, Grade
                            from People join Child
                            on People.PeopleID = Child.ChildID
                            where ZipCode = $zip";
                
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "First Name: " . $row["FirstName"]. "<br>Last Name: " . $row["LastName"]. 
                    "<br>Grade Level: " . $row["Grade"]. "<br><hr>";
                    }
                } 
                else {
                    echo "0 results";
                }
                echo '</div>';
                echo '</div>';
            }

			?>

          <!--</div>--> <!--Not needed with "topnav"-->
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
