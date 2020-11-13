<<<<<<< HEAD:src/resources.html
<!--  COLOR SCHEME 
#082C44 - navy
#71EAF5 - light blue
#FEE6E2 - lightpnk
#FFA94C - gold
#FD2C88 - dark pink
-->

=======
>>>>>>> dev-Dakota:src/resources.php
<?php
    if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Resources</title>
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
                <li><a href="index.php" alt="home"><i class="material-icons md-48">house</i></a></li>
                <li><a href="messages.php" alt="messages"><i class="material-icons md-48">mail</i></a></li>
                <li><a href="calendar.php" alt="calendar"><i class="material-icons md-48">insert_invitation</i></a></li>
                <li><a href="profileBuilderNav.php" alt="profile"><i class="material-icons md-48">face</i></a></li>
                <li><a href="resources.php"  class="active" alt="resources"><i class="material-icons md-48">book</i></a></li>
                <li><a href="searchpods.php" alt="search group"><i class="material-icons md-48">search</i></a></li>
        </div>

        <!-- MAIN BODY -->
        <div class="main">
            <div class="card">
                <div class="container">
                    <h2>Resources</h2>
                    <p>Here are a list of resources.</p>
                    <h3>College</h3>
                    
                    <li><a href="https://ncte.org/resources/">www.ncte.org </a</li>
                    <li><a href="https://www.coursera.org/">www.coursera.org </a</li>
                    <li><a href="https://www.khanacademy.org/">www.kahnacademy.com </a</li>
                    <li><a href=" https://www.edutopia.org/ ">www.edutopia.org </a</li>

                </div>
            </div>
        </div>

        <script src="logOutOption.js"></script>
        <script>
            var userSignedIn = new logOutOption();
        </script>
    </body>
</html>
