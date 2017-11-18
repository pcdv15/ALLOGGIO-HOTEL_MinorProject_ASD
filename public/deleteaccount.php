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
        $deletelogindetails =  mysqli_query($connection, "DELETE FROM login WHERE uid = $uid");

        if($deletelogindetails) {
            $deleteuserdata = mysqli_query($connection, "DELETE FROM userinfo WHERE id = $uid");

            if($deleteuserdata) {
                header("Location: logout.php");
            }
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
  <title>Delete Account</title>
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
            <h3>Are you sure?</h3>
            <input class="space" type="submit" name="submit" value="YES"> 
        </form>
        <a class="" href="profile.php"><button  class="">NO</button></a> <br>
        <p class="space"></p>
        

                    
    </div>


</body>
</html>
<?php 
    mysqli_close($connection);
?>