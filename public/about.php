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
			<p class="" style="text-align:center;">The Alloggio hotel offers a new experience in hospitality.</p>
			<p class="" style="text-align:center;">Alloggio is the Italian word for "accommodation", a perfect place for stay with a local vibe to create an inviting place where relaxation, play, and work can mix. Come and join us!</p>
			
				</div>
				<h5 style="text-align:center;">Contact Us</h5>
				<div class="first_icons">
				<a href="#"><img src="images/facebook.png" width="7%" height="7%"></a>
				<a href="#"><img src="images/google-plus.png" width="7%" height="7%" class="space2"></a>
				<a href="#"><img src="images/twitter.png" width="7%" height="7%" class="space2"></a>
				</div>
				<div class="second_icons">
				<img src="images/email.png" width="5%" height="5%"></img>&nbsp;&nbsp;&nbsp;<label>alloggio@mail.com</label>
				<br />
				<img src="images/home.png" width="5%" height="5%">&nbsp;&nbsp;&nbsp;<label>Street Kahayag, Davao City</label>
				<br />
				<a href="#"><img src="images/telephone.png" width="5%" height="5%"></a>&nbsp;&nbsp;&nbsp;<label>232-7000</label>
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
