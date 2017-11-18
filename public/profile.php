<?php
    include('../include/session.php');
    require_once("../include/conn.php");
    $error = "";
    $success_message = "";

    $uid = $_SESSION['uid'];
    $sql = "SELECT firstname,lastname, address, email, dateofbirth FROM userinfo WHERE id = $uid";
    $query = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($query);

    $fullname = $row['firstname']." ".$row['lastname'];
    $address = $row['address'];
    $email = $row['email'];
    $dob = $row['dateofbirth'];
    

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Profile</title>
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

    <div class="twelve columns space container u-cf" style="padding-left:1em;padding-right:1em;padding-top:1em;">
    <div class="u-pull-right" style="border:3px solid #fdcd47;border-radius:5px;padding:1em;margin-top: 4em;">
        <a href="#"><button  class="margin_button">Edit Email</button></a> <br>
        <a href="#"><button  class="margin_button">Edit Password</button></a> <br>
        <a href="#"><button  class="margin_button">Delete Account</button></a> <br>
        </div>
        <h4>Profile</h4>
        <label for="">Name: &nbsp;<?php echo $fullname; ?></label> <br>
        <label for="">Address: &nbsp;<?php echo $address; ?></label> <br>
        <label for="">Email: &nbsp;<?php echo $email; ?></label> <br>
        <label for="">Date of Birth: &nbsp;<?php echo $dob; ?></label> <br>


                    
    </div>


</body>
</html>
<?php 
    mysqli_close($connection);
?>