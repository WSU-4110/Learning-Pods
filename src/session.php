<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	include('config.php');

	$user_check = $_SESSION['login_user'];

	$ses_sql = mysqli_query($db,"select UserID from LogOn where UserID = '$user_check' ");

	$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
	
	$login_session = $row['UserName'];

	if(!isset($_SESSION['login_user'])){
		die();
	}
?>