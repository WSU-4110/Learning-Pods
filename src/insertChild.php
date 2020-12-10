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
        <title>Search Meeting</title>
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
            <a href="javascript:void(0);" onclick="openMenu()"  id="cacncel" style="display:none;"><i class="material-icons md-48" style="font-size: 28px;">close</i></a>
            <div id="myAccount">
                <a href="logout.php" alt="logout"> Logout </a>
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
              <div class="topnav">
                <h2>Choose a Child</h2>
				
				<form action="<?php $_PHP_SELF ?>" method="post">
				<label for="cname">Enter Name of Child Attending the Meeting:</label><br>
				<input type="text" id="cname" name="cname" value="john"><br><br>
				<input type="submit" id="submit" class="button" value="Create Meeting">
				</form>
			
			<?php
				include("config.php");
	
   
   
				if($_SERVER["REQUEST_METHOD"] == "POST") {
					if(! $db ) {
					   die('Could not connect: ' . mysql_error());
					}
					
				    $userid = $_SESSION['login_id'];
					if(isset($_GET['pid'])) {
                        $pid = $_GET['pid'];
                        ///echo "The pid is set to: ".$pid;
                    }
                    else {
                        echo "pid is not set properly";
                    }
				//	$pid = $_SESSION["gpid"];
					echo "The current PID is: ".$pid;
					$fname = $_POST['cname'];
					$parentid = current(mysqli_query($db, "select PeopleID from People where UserID like '$userid'")->fetch_assoc());
					$childid = current(mysqli_query($db, "select ChildID from Child join People on Child.ChildID = People.PeopleID where ParentID like $parentid and FirstName like '$fname'")->fetch_assoc());
					//$podid = current(mysqli_query($db, "select PodID from Pod where HostID = $parentid")->fetch_assoc());
					
					$sql1 = "INSERT INTO Pod_People (ChildID, PodID) 
								VALUES($childid, $pid)";
						
					if ($db->query($sql1) === TRUE) {
						//echo "New record created successfully";
						//header('Location: viewPods.php');
					} else {
						echo "Error: " . $sql1 . "<br>" . $db->error;
					}
					
				}
			
			?>
			
              </div>
            </div>
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
