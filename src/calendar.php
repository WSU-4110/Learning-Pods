<?php
    if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Events</title>
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
                    <a href="php/logout.php" alt="logout">Logout</a>
                </div>
                <a href="javascript:void(0);" onclick="openMenu()"  id="logout"><i class="material-icons md-48" style="font-size: 28px;">exit_to_app</i></a>
            </div>

        </header>

        <!-- NAV BAR -->
        <div class="navbar">
                <li><a href="index.html" alt="home"><i class="material-icons md-48">house</i></a></li>
                <li><a href="messages.html" alt="messages"><i class="material-icons md-48">mail</i></a></li>
                <li><a href="calendar.html" class="active" alt="calendar"><i class="material-icons md-48">insert_invitation</i></a></li>
                <li><a href="profile.html" alt="profile"><i class="material-icons md-48">face</i></a></li>
                <li><a href="resources.html" alt="resources"><i class="material-icons md-48">book</i></a></li>
                <li><a href="searchpods.html" alt="search group"><i class="material-icons md-48">search</i></a></li>
        </div>

        <!-- MAIN BODY -->
        <div class="main">
            <div class="card">
                <div class="container">
                    <h2>Events</h2>
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
