<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Alloggio</title>
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
		include('../include/conn.php');
		session_start();
		if(isset($_SESSION['logined_user'])) {
			include("../include/header2.html");
		} else {
			include("../include/header1.html");
		}
	
	?>
		   <div class="about_us">
				lorem ipsum dolor sit amet 
				</div>
				<div class="first_icons">
				<a href="#"><img src="images/facebook.png" width="7%" height="7%"></a>
				<a href="#"><img src="images/google-plus.png" width="7%" height="7%" class="space2"></a>
				<a href="#"><img src="images/twitter.png" width="7%" height="7%" class="space2"></a>
				</div>
				<div class="second_icons">
				<img src="images/email.png" width="5%" height="5%"></img>&nbsp;&nbsp;&nbsp;alloggio@mail.com
				<br />
				<img src="images/home.png" width="5%" height="5%">&nbsp;&nbsp;&nbsp;Street Kahayag, Davao City
				<br />
				<a href="#"><img src="images/telephone.png" width="5%" height="5%"></a>&nbsp;&nbsp;&nbsp;232-7000
				</div>
			</div>
      
		<?php
		include('../include/footer.html');
	?>
	</div> <!-- end of container div -->

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
