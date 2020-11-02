<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	include('config.php');

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//username and password sent from form 
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']); 

		$sql = "SELECT UserID FROM LogOn WHERE UserName = '$myusername' and UserPassword = '$mypassword'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);

		// must be in the same row
		if($count == 1) {
			$_SESSION['login_user'] = $myusername;
			$_SESSION['login_id'] = current(mysqli_query($db, "SELECT UserID FROM LogOn WHERE UserName = '$myusername' and UserPassword = '$mypassword'")->fetch_assoc());

			header("location: index.php");
		}
		else {
			$error = "Your Login Name or Password is invalid";
		}
	}
?>
   <head>
      <title>Learning Pods Login</title>
   </head>
   
   <body bgcolor = "#FFFFFF">
      <div align = "center">
         <div style = "width:300px; border: solid 1px #FFA94C; " align = "left">
            <div style = "background-color:#082C44; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            <div style = "margin:30px">
               <form action = "<?php $_PHP_SELF ?>" method = "post">
                  <label>Username </label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password </label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
			   <span>New User? <a href="signup.php" alt="signup">Sign up!</a></span>		
            </div>		
         </div>		
      </div>
   </body>
</html>