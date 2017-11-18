<?php
    include('../include/session.php');
    require_once("../include/conn.php");
    $error = "";
    $success_message = "";

    $uid = $_SESSION['uid'];
    $sql = "SELECT * FROM userinfo WHERE id = $uid";
    $query = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($query);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $mypassword = mysqli_real_escape_string($connection,$_POST['oldpass']);
        $myusername = $_SESSION['logined_user'];

        $query  = "SELECT * ";
      $query .= "FROM login ";
      $query .= "WHERE username = '$myusername'";

      $result = mysqli_query($connection, $query);
      $login = mysqli_fetch_assoc($result);

      $hashed_password = $login['password'];

      $newpass = mysqli_real_escape_string($connection,$_POST['newpass']);
      $confirmpass = mysqli_real_escape_string($connection,$_POST['confirmpass']);
      
      $count = mysqli_num_rows($result); //query above must result 1 row

      if($count == 1) {
        if(password_verify($mypassword, $hashed_password)) { //Verify password if it's equal to the hashed password in db
            if($newpass === $confirmpass) {
                $hashednewpass = password_hash($newpass, PASSWORD_DEFAULT);
                $updatepass = mysqli_query($connection, "UPDATE login SET password='$hashednewpass' WHERE uid = $uid");
                if($updatepass) {
                    $success_message = "Update password successful!";
                }
            } else {
                $error = "Your new password doesn't match!";
            }
          
        } else {
          $error = "Your old password is incorrect";
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
  $success = $success_message;
?>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Change Password</title>
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
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>

</head>
<body class="container">
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<?php 
	if(isset($_SESSION['logined_user'])) {
		require("../include/header2.html");
	} else {
		require("../include/header1.html");
    }
    ?>

    <div class="twelve columns space container u-cf reg_form" style="padding-left:1em;padding-right:1em;padding-top:1em;">
    <a class="u-pull-right" href="profile.php"><button  class="margin_button">Go Back</button></a>
        <form action="" method="post">
        <br><br><br>
            <h3>Change Password</h3>
            <p style="color:green;"><?php echo $success; ?></p>
            <p style="color:red;"><?php echo $error; ?></p>
            <p class="space">Old Password:</p>
            <input type="password" name="oldpass" required>
            <p class="space">New Password:</p>
            <input type="password" name="newpass" required>
            <p class="space">Confirm New Password:</p>
            <input type="password" name="confirmpass" required> <br>
            <input class="space" type="submit" name="submit" value="Submit">
        </form>

                    
    </div>


</body>
</html>
<?php 
    mysqli_close($connection);
?>