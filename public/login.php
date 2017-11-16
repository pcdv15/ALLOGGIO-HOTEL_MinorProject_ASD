<?php
    require_once("../include/conn.php");
    session_start();
    //sample input for login data
    //Username: pcdv15
    //Password: 1234
    $error = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent within form
      $myusername = mysqli_real_escape_string($connection,$_POST['username']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['password']);

      $query  = "SELECT * ";
      $query .= "FROM login ";
      $query .= "WHERE username = '$myusername'";

      $result = mysqli_query($connection, $query);
      $login = mysqli_fetch_assoc($result);

      $hashed_password = $login['password'];
      
      $count = mysqli_num_rows($result); //query above must result 1 row

      

      if($count == 1) {
        if(password_verify($mypassword, $hashed_password)) { //Verify password if it's equal to the hashed password in db
          $_SESSION['logined_user'] = $myusername;
          $_SESSION['uid'] = $login['uid'];
          header("Location: dashboard.php");
          
        } else {
          $error = "Your login credentials are invalid";
        }
        
      }else {
        $error = "Your login credentials are invalid";
      }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php

    $message = $error; 
  ?>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/Alloggio_icon.png">

 
</head>

<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<div class="container">
			
				<div class="twelve columns menu_bar">
				<a class="button margin_button button-primary" href="index.php">Alloggio</a>
				<a class="button margin_button button-primary" href="#">About</a>
				<a class="button margin_button button-primary" href="#">Contact</a>
				</div>
		
				<div class="twelve columns reg_form">
					<form action="" method="post">
              <p><img style="display: block; margin: 0 auto;z-index: 1; width: 28%; height: 28%;" src="images/Alloggio_logo.png"></p>
              <p style="color:red;"><?php echo $message; ?></p>
							<h3>Sign In</h3>
							<p>Username:</p>
							<input type="text" name="username" pattern="^[A-Za-z0-9_]{1,15}$" autofocus required title="Should only contain alphanumeric characters and an underscore">
							<p>Password:</p>
							<input type="password" name="password" required>
							<br /><br />
              <input type="submit" value="submit" name="submit">
              
          </form>
        </div>
        
	</div>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>

</html>
<?php 

    mysqli_close($connection);
?>