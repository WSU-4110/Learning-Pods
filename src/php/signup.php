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
    <div align = "center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
				<h2>Learning Pods Signup</h2>
				<p>Please enter the following information to create your Learning Pods account!</p>
				
				<form action="<?php $_PHP_SELF ?>" method="post">
					<label for="username">Username:</label><br>
					<input type="text" id="username" name="username" value="username"><br><br>
					<label for="password">Password:</label><br>
					<input type="text" id="password" name="password" value="password"><br><br>
					<input type="radio" name="Terms" required value="1"><label for="Terms"> I agree to the <a href="policy.html">Privacy policy</a></label><br><br>
					<input type="submit" id="submit" class="button" value="Submit">
				</form>
					<span class="forgotpass">Already a member? <a href="login.php" alt="pass">Login</a></span>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
