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


	//$user_check = $_SESSION['logined_user']; //check if user is logined
	
	//$ses_sql = mysqli_query($connection, "SELECT username from login where username = '$user_check' ");
	
	//$result = mysqli_fetch_assoc($ses_sql);
	
	//$login_session = $result['username'];

	if(isset($_SESSION['logined_user'])) {
		require("../include/header2.html");
	} else {
		require("../include/header1.html");
	}
//require("../include/header1.html");

?>
		<div class="logo_home">
				<img src="images/Alloggio_logo.png">
		</div> <!-- end of logo_home div -->
		<div class="slide_show">
		</div> <!-- end of slide_show div -->
		<div class="rooms_info">
			<img src="images/design.jpg" width="700" class="img_center">
			<h3>Our Rooms</h3>
			<a href="#standard"><img src="images/standard.jpg" width="200" height="150" class="room1 standard"></a>
			<a href="#deluxe"><img src="images/deluxe.jpg" width="200" height="150" class="rooms deluxe"></a>
			<a href="#suite"><img src="images/suite.jpg" width="200" height="150" class="suite"></a>
			<label class="room_label">
				<p class="sdr">Standard Rooms</p>
				<p class="dr">Deluxe Rooms</p>
				<p class="sr">Suite Rooms</p>
			</label>
			<img src="images/design2.jpg" width="700" class="img_center">
		</div> <!-- end of rooms_info div -->
		<div id="standard">
			<hr>
			<div class="four columns">
				<form>
					<label>Check In</label>
					<input type="text" placeholder="MM" name="checkin_month" class="checkin" required>
					<input type="text" placeholder="DD" name="checkin_day" class="checkin" required>
					<input type="text" placeholder="YYYY" name="checkin_year" class="checkin year" required> 
					<label>Check Out</label>
					<input type="text" placeholder="MM" name="checkout_month" class="checkin" required>
					<input type="text" placeholder="DD" name="checkout_day" class="checkin" required>
					<input type="text" placeholder="YYYY" name="checkout_year" class="checkin year" required> 
				<div class="more_info">
				<h3 class="space">PACKAGE</h3>
					<div class="inclusions">
						<h4>Inclusions</h4>
						<ul>
							<li>Complimentary wifi access</li>
							<li>Can accommodate up to 2 persons</li>
						</ul>
					</div> <!-- end of inclusions div -->
					<div class="ammenities">
						<h4>Room Amenities</h4>
						<p>
						1 DOUBLE SIZED BED , fan ventilated, hot and cold shower, cable television. All Room type rates inclusive of two (2) set breakfast.
						</p>
					</div> <!-- end of ammenities div -->
					<div class="more_image">
					<a class="button space move2" href="rooms.php">Check Room Availabilities</a>
					<br />
					<h3 class="move">Standard</h3>
					<img src="images/standard.jpg"  width="380" height="300">
					</div> <!-- end of more_image div -->
				</div> <!-- end of more_info div -->
					<input type="submit" value="NEXT" class="space next_button">
					</form>
			</div> <!-- end of four columns div -->
		</div> <!-- end of standard div -->
		<div id="deluxe">
			<hr>
			<div class="four columns">
				<form>
					<label>Check In</label>
					<input type="text" placeholder="MM" name="checkin_month" class="checkin" required>
					<input type="text" placeholder="DD" name="checkin_day" class="checkin" required>
					<input type="text" placeholder="YYYY" name="checkin_year" class="checkin year" required> 
					<label>Check Out</label>
					<input type="text" placeholder="MM" name="checkout_month" class="checkin" required>
					<input type="text" placeholder="DD" name="checkout_day" class="checkin" required>
					<input type="text" placeholder="YYYY" name="checkout_year" class="checkin year" required> 
				<div class="more_info">
				<h3 class="space">PACKAGE</h3>
					<div class="inclusions">
						<h4>Inclusions</h4>
						<ul>
							<li>Complimentary wifi access</li>
							<li>Complimentary use of swimming pool and gym</li>
							<li>Can accommodate up to 4 persons</li>
						</ul>
					</div> <!-- end of inclusions div -->
					<div class="ammenities">
						<h4>Room Amenities</h4>
						<p>
						1 DOUBLE Bed, air conditioned. All Room type rates inclusive of 2 set breakfast and one (1) complimentary massage per day.
						</p>
					</div> <!-- end of ammenities div -->
					<div class="more_image">
					<a class="button space move2" href="rooms.php">Check Room Availabilities</a>
					<br />
					<h3 class="move">&nbsp;Deluxe</h3>
					<img src="images/deluxe.jpg"  width="380" height="300">
					</div> <!-- end of more_image div -->
				</div> <!-- end of more_info div -->
					<input type="submit" value="NEXT" class="space next_button">
					</form>
			</div> <!-- end of four columns div -->
		</div> <!-- end of deluxe div -->
			<div id="suite">
			<hr>
			<div class="four columns">
				<form>
					<label>Check In</label>
					<input type="text" placeholder="MM" name="checkin_month" class="checkin" required>
					<input type="text" placeholder="DD" name="checkin_day" class="checkin" required>
					<input type="text" placeholder="YYYY" name="checkin_year" class="checkin year" required> 
					<label>Check Out</label>
					<input type="text" placeholder="MM" name="checkout_month" class="checkin" required>
					<input type="text" placeholder="DD" name="checkout_day" class="checkin" required>
					<input type="text" placeholder="YYYY" name="checkout_year" class="checkin year" required> 
				<div class="more_info">
				<h3 class="space">PACKAGE</h3>
					<div class="inclusions">
						<h4>Inclusions</h4>
						<ul>
							<li>Complimentary wifi access</li>
							<li>Complimentary use of swimming pool and gym</li>
							<li>1 sofa bed and 1 extra bed</li>
						</ul>
					</div> <!-- end of inclusions div -->
					<div class="ammenities">
						<h4>Room Amenities</h4>
						<p>
						Good for 5-7 persons with 2 double bed, air conditioned, hot and cold shower with bathtub, telephone, flat TV. All Room type rates inclusive of 4 set breakfast and two (2) complimentary massage per day. 
						</p>
					</div> <!-- end of ammenities div -->
					<div class="more_image">
					<a class="button space move2" href="rooms.php">Check Room Availabilities</a>
					<br />
					<h3 class="move">&nbsp;&nbsp;&nbsp;Suite</h3>
					<img src="images/suite.jpg"  width="380" height="300">
					</div> <!-- end of more_image div -->
				</div> <!-- end of more_info div -->
					<input type="submit" value="NEXT" class="space next_button">
					</form>
			</div> <!-- end of four columns div -->
		</div> <!-- end of deluxe div -->
	</div> <!-- end of container div -->
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
