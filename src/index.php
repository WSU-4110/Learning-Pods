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
        <title>Learning Pods</title>
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
                    <a href="logout.php" alt="logout">Logout</a>
                </div>
                <a href="javascript:void(0);" onclick="openMenu()"  id="logout"><i class="material-icons md-48" style="font-size: 28px;">exit_to_app</i></a>
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
                
                    <h2>Home</h2>
					<h2>Welcome to Learning Pods <?php echo $_SESSION["login_user"]; ?></h2><br>
					<h2><a href = "logout.php">Sign Out</a></h2><br>
					<h2><a href = "viewPods.php">Search Learning Pod Meetings</a></h2><br>
					<h2><a href = "createPod.php">Create Learning Pod</a></h2><br>
                    </div>
            </div>
		<h3> About us </h3>
			<p>Learning-Pods is a web application that allows parents and legal guardians 
			to have the opportunity to continue to build their children’s education and
			social skills while keeping them safe during a pandemic. It allows small
			groups to form meetups within a community. Rather than put all the stress
			on one user of the group there will be a rotation of hosts within the group 
			for the duration of the group’s length.</p>
		</div>
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
