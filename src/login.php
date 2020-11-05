<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      //username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM LogOn WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      
      // must be in the same row
      if($count == 1) {
         session_register("myusername");
         $_SESSION['sessionCheck'] = $myusername;
         
         header("location: index.html");
      }else {
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
               
               <form action = "" method = "post">
                  <label>Username </label><input type = "text" name = "username" class = "box" required><br /><br />
                  <label>Password </label><input type = "password" name = "password" class = "box" required><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
			   <span>New User? <a href="signup.php" alt="signup"">Sign up!</a></span>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>		
            </div>		
         </div>		
      </div>
   </body>
</html>
