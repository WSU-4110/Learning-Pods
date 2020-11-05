<?php
	include("config.php");


	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(! $db ) {
		   die('Could not connect: ' . mysql_error());
		}
		
		
	   $username = $_POST['username'];
	   $password = $_POST['password'];
		
		mysqli_query($db, "INSERT INTO LogOn ". "(UserName,UserPassword) ". 
		"VALUES('$username','$password')");
		
		header("location: login.php");
		 
		mysqli_close($db);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="learningPods.css"> 
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
				<h2 class="text-center">Learning Pods Signup</h2>
				<p class="text-center">We just need a few things:</p>
				
				<form action="<?php $_PHP_SELF ?>" method="post">
					<label for="username">UserName:</label><br>
					<input type="text" id="username" name="username" value="user name" required><br><br>
					<label for="password">Last name:</label><br>
					<input type="text" id="password" name="password" value="password" required><br><br>
					<input type="radio" name="Terms" required value="1"><label for="Terms"> I aggree to <a href="policy.html">Privacy policy</a></label><br><br>
					<input type="submit" id="submit" class="button" value="Submit">
				</form>
					<span class="forgotpass">Already a member? <a href="login.html" alt="pass">Login</a></span>
                  </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
