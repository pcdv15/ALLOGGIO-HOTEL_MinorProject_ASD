<?php
    include('../include/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Dashboard</title>
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
	<?php 



	if(isset($_SESSION['logined_user'])) {
		require("../include/header2.html");
	} else {
		require("../include/header1.html");
	}


?>

<div>
<a href="book.php"><button  class="margin_button">Reserve Room</button></a> <br>
<a href="reservations.php"><button  class="margin_button">View Reservations</button></a> <br>
<a href="profile.php"><button  class="margin_button">View Profile</button></a>
</div>

</body>
</html>
