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
		    <div>
        		<img style="display: block; margin: 0 auto;z-index: 1; width: 28%; height: 28%;" src="images/Alloggio_logo.png">
			</div>
		<div class="rooms_info">
		<h3>Our Rooms</h3>
			<img src="images/design.png" width="700" class="img_center">
	
	<script type="text/javascript"> 
		var i = 0; 
		var image = new Array();   
		// LIST OF IMAGES 
		image[0] = "images/standard.jpg"; 
		image[1] = "images/deluxe.jpg"; 
		image[2] = "images/suite.jpg";   
		var k = image.length-1;    

		var caption = new Array(); 
		// LIST OF CAPTIONS 
		caption[0] = "Standard"; 
		caption[1] = "Deluxe"; 
		caption[2] = "Suite"; 

		var link= new Array();   
		// LIST OF LINKS 
		link[0] = "#standard"; 
		link[1] = "#deluxe"; 
		link[2] = "#suite";   
    

		function swapImage(){ 
			var el = document.getElementById("mydiv"); 
			el.innerHTML=caption[i]; 
			var img = document.getElementById("slide"); 
			img.src= image[i]; 
			var a = document.getElementById("link"); 
			a.href= link[i]; 

			if(i < k ) { i++;}  
			else  { i = 0; } 
			setTimeout("swapImage()",8000); 
		} 
		function addLoadEvent(func) { 
			var oldonload = window.onload; 
			if (typeof window.onload != 'function') { 
				window.onload = func; 
			} else  { 
			window.onload = function() { 
			if (oldonload) { 
			oldonload(); 
		} 
		func(); 
		} 
		} 
		} 
		addLoadEvent(function() { 
		swapImage(); 
		});  
</script> 
<table style="border:none;background-color:transparent; margin:auto;"> 
	<tr> 
		<td>
		<a name="link" id="link" target=""><img class="w3-animate-fading" name="slide" id="slide" style="border: 2px ridge #FFE57F; border-radius: 5px; margin:auto" width="250" height="200"  src="image-1.png"/></a>
		
		</td> 
	</tr> 
	<tr> 
		<td align="center" class="w3-animate-fading" style="text-align:center; color:white;"> 
		<a name="link" style="text-align:center; color:white;" id="link" target=""><div id="mydiv"></div></a>
		</td> 
	</tr>  
</table>

			<img src="images/design2.png" width="700" class="img_center">
		</div> <!-- end of rooms_info div -->
		<div id="standard">
			<div class="four columns"> 
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
					<div class="more_image2">
					<h3 class="move3">Standard</h3>
					<img src="images/standard.jpg"  width="380" height="300">
					</div> <!-- end of more_image div -->
				</div> <!-- end of more_info div -->
			</div> <!-- end of four columns div -->
		</div> <!-- end of standard div -->
		<div id="deluxe">
			<div class="four columns">
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
					<div class="more_image3">
					<h3 class="move3">&nbsp;Deluxe</h3>
					<img src="images/deluxe.jpg"  width="380" height="300">
					</div> <!-- end of more_image div -->
				</div> <!-- end of more_info div -->
			</div> <!-- end of four columns div -->
		</div> <!-- end of deluxe div -->
			<div id="suite">
			<div class="four columns">
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
					<div class="more_image4">
					<h3 class="move3">&nbsp;&nbsp;&nbsp;Suite</h3>
					<img src="images/suite.jpg"  width="380" height="300">
					</div> <!-- end of more_image div -->
				</div> <!-- end of more_info div -->
			</div> <!-- end of four columns div -->
		</div> <!-- end of deluxe div -->
		<?php
		include('../include/footer.html');
	?>
	</div> <!-- end of container div -->

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
