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
			<div class="cont">
				<div class="twelve columns menu_bar">
				<a class="button margin_button" href="index.php">Alloggio</a>
				<a class="button" href="#">Contact</a>
				</div>
			</div>
				<div class="twelve columns reg_form">
					<form>
							<img src="images/Alloggio_logo.png">
							<h3>Sign Up</h3>
							<label class="space">First Name:</label>
							<input type="text" name="firstname" required>
							<label class="space">Last name:</label>
							<input type="text" name="lastname" required>
							<label class="space">Address:</label>
							<input type="text" name="address" required>
							<label class="space">Email:</label>
							<input type="text" name="email" required>
							<label class="space">Username:</label>
							<input type="text" name="username" required>
							<label class="space">Password:</label>
							<input type="password" name="password" required>
							<label class="space">Date of Birth:</label>
							<input type="text" placeholder="YYYY" name="dob_year" class="dob" required>
							<input type="text" placeholder="MM" name="dob_month" class="dob" required>
							<input type="text" placeholder="DD" name="dob_day" class="dob" required> 
							<br /><br />
							<input type="submit" value="submit">
					</form>
				</div>
	</div>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
