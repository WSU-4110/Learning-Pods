<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['sessionCheck'];
   
   $ses_sql = mysqli_query($db,"select UserName from LogOn where UserName = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['sessionCheck'])){
      header("location:login.php");
      die();
   }
?>