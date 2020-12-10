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
        <title>Create Meeting</title>
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
				  <h2>Add School</h2>
						
						<form action="<?php $_PHP_SELF ?>" method="post">
						<input type="radio" name="Terms" required value="1"><label for="Terms"> I aggree to <a href="policy.html">Privacy policy</a></label><br><br>
						<input type="submit" id="submit" class="button" value="Add School"><br><br>
						</form>
						<?php
						include("config.php");
			
		   
		   
						if($_SERVER["REQUEST_METHOD"] == "POST") {

                            $userid3 = $_SESSION['login_id'];
                            $zip = current(mysqli_query($db, "select ZipCode from People where UserID like '$userid3'")->fetch_assoc());
                            $parentid = current(mysqli_query($db, "select PeopleID from People where UserID like '$userid3'")->fetch_assoc());

                            $grd = current(mysqli_query($db, "select Grade from Child join People on People.PeopleID = Child.ChildID where ParentID = $parentid")->fetch_assoc());
                            
                            $child = current(mysqli_query($db, "select ChildId from Child join People on People.PeopleID = Child.ChildID where ParentID = $parentid")->fetch_assoc());
                            
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
                            
                            echo '<form action="" method="post">';
                            

                            
                            echo '<label for="SchoolName">School Name</label><br>';
                            echo '<select id="SchoolName" name="SchoolName" onchange="javascript:this.form.submit()">';
                            
                            if ($resultSetSchool->num_rows > 0){
                                echo 'Schools found <br>';
                                while ($row = $resultSetSchool->fetch_assoc()){
                                    echo "<option value='". $row['SchoolName']. "'>" . $row['SchoolName'] . " </option>";
                                }
                                echo '</select>';
                                echo '<input type="submit" id="submit" value="Submit" class="button" >';
                                echo '</form>';
                                
                                $schoolname = $_POST['SchoolName'];

                                $sql3 = "UPDATE Child SET SchoolName='$schoolname' WHERE ChildID=$child"; 
                                if ($db->query($sql3) === TRUE) {
                                    echo "New record created successfully";
                                } else {
                                    echo "Error: " . $sql3 . "<br>" . $db->error;
                                }

                            }
                            // else echo "No schools";
                            //     echo '<button type="submit" id="submit" name="schoolname" class="button" value="Submit">';
                            //     echo '</form>';
                            }
                            else echo "No schools";

                        
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
