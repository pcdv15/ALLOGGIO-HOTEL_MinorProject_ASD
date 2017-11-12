<?php
	require("../include/conn.php");
	$error = "";
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$address = $_POST["address"];
		$email =  $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$dob_year = $_POST["dob_year"];
		$dob_month = $_POST["dob_month"];
		$dob_day = $_POST["dob_day"];

		$firstname = mysqli_real_escape_string($connection, $firstname);
		$lastname = mysqli_real_escape_string($connection, $lastname);
		$address = mysqli_real_escape_string($connection, $address);
		$email = mysqli_real_escape_string($connection, $email);
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		$hashed_password = password_hash($password, PASSWORD_DEFAULT); //hashed password
		$dob_year = mysqli_real_escape_string($connection, $dob_year);
		$dob_month = mysqli_real_escape_string($connection, $dob_month);
		$dob_day = mysqli_real_escape_string($connection, $dob_day);
		$dateofbirth = $dob_year . "-" . $dob_month . "-" . $dob_day;

		$query_1 = "SELECT * FROM userinfo WHERE email='$email'";
		$result = mysqli_query($connection, $query_1);
		$row = mysqli_fetch_assoc($result);

		if(mysqli_num_rows($result) == 1) {
			$error = "Email already exists!";
		} else {
			$query_2 = mysqli_query($connection, "INSERT INTO userinfo (firstname, lastname, address, email, dateofbirth, create_date) VALUES ('$firstname', '$lastname', '$address', '$email', '$dateofbirth', CURRENT_TIMESTAMP)");

			if($query_2) {
				$query_3 = "SELECT id FROM userinfo WHERE email='$email'";
				$query_result = mysqli_query($connection, $query_3);
				$query_row = mysqli_fetch_assoc($query_result);

				$id = $query_row['id'];

				$query_4 = mysqli_query($connection, "INSERT into login (uid, username, password) VALUES ($id, '$username', '$hashed_password')");

				if($query_4) {
					$success_message = "Registration successful!";
					echo $success_message;
				} else {
					echo "Registration failed!";
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    //echo ;
    $message = $error; 
  ?>
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
					<form method="post" action="">
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
							<p style="color:red;"><?php echo $message; ?></p>
							<label class="space">Username:</label>
							<input type="text" name="username" required>
							<label class="space">Password:</label>
							<input type="password" name="password" required>
							<label class="space">Date of Birth:</label>
							<input type="text" placeholder="YYYY" name="dob_year" class="dob" required>
							<input type="text" placeholder="MM" name="dob_month" class="dob" required>
							<input type="text" placeholder="DD" name="dob_day" class="dob" required> 
							<br /><br />
							<input type="submit" name="submit" value="submit">
					</form>
				</div>
	</div>

	
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
