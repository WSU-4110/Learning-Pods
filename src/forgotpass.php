<?php
    if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
?>
<!DOCTYPE html> 
<html lang="en"> 
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="learningPods.css">
		<h2>Forgot Password?</h2> 
</head>

<body> 
/* send user to page after processing a successful email in SQL*/
    <form action="/placeholderPasswordPage.php"> 
  
        <div class="container"> 
            <label><b>Email</b></label> 
            <input type="text" placeholder="Enter Email" name="email" required> 
  
			<div class="button">
            <button type="submit">Submit</button>
			</div>
        </div> 
    </form> 
  
</body> 
  
</html> 
