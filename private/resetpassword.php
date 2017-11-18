<?php
    require_once("../include/conn.php");
    $message = "";
    $error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $defaultpass = 1234;

        $hasheddefpass = password_hash($defaultpass, PASSWORD_DEFAULT);

        
      $query  = "SELECT * ";
      $query .= "FROM login ";
      $query .= "WHERE username = '$username'";

      $result = mysqli_query($connection, $query);
      $login = mysqli_fetch_assoc($result);

      $hashed_password = $login['password'];
      
      $count = mysqli_num_rows($result); //query above must result 1 row
        
      if($count == 1) {
        $updatepass = mysqli_query($connection, "UPDATE login SET password='$hasheddefpass' WHERE username = '$username'");
        
                if($updatepass) {
                    $message = "Password reset successful!";
                }
      } else {
          $error = "Username not found!";
      }


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
  $success = $message;
?>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Reset Password</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  
  <link rel="stylesheet" href="../public/css/skeleton.css">
  <link rel="stylesheet" href="../public/css/normalize.css">
  <link rel="stylesheet" href="../public/css/style.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="../public/images/Alloggio_icon.png">

</head>
<body>
<h2 style="text-align: center; margin-top:10%;">Reset User Password</h2>
<p style="text-align:center;color:green;" ><?php echo $success; ?></p>
<p style="text-align:center;color:red;" ><?php echo $error; ?></p>
<div style="text-align:center;"><a  class=" status_table" href="admin.php"><button  class="margin_button">Go Back</button></a></div>
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<div class="container" style="margin-top:5%;  position: relative;
    max-width: 80%;
    margin: 0 auto;
    box-sizing: border-box;
    background-color:rgba(0, 105, 92, 0.45);
    border-radius: 5px;">

<div class="twelve columns" style="padding: 1em;margin-left:10px;text-align:center;">
    <form action="" method="post">
        <p>Enter username:</p>
        <input type="text" name="username" pattern="^[A-Za-z0-9_]{1,15}$" autofocus required title="Should only contain alphanumeric characters and an underscore">
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
</div>
</body>
</html>
<?php
    mysqli_close($connection);
?>