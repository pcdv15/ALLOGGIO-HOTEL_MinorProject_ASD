<?php
	require("../include/conn.php");
	$error = "";
	$error2 = "";
	$success_message = "";
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$firstname = ucwords($_POST["firstname"]);
		$lastname = ucwords($_POST["lastname"]);
		$address = $_POST["address"];
		$email =  $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$dob = $_POST["dob"];

		$firstname = mysqli_real_escape_string($connection, $firstname);
		$lastname = mysqli_real_escape_string($connection, $lastname);
		$address = mysqli_real_escape_string($connection, $address);
		$email = mysqli_real_escape_string($connection, $email);
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		$hashed_password = password_hash($password, PASSWORD_DEFAULT); //hashed password

		$dateofbirth = $dob;

		$query_1 = "SELECT * FROM userinfo WHERE email='$email'";
		$result = mysqli_query($connection, $query_1);
		$row = mysqli_fetch_assoc($result);

		$query_11 = "SELECT * FROM login WHERE username='$username'";
		$result1 = mysqli_query($connection, $query_11);
		$row1 = mysqli_fetch_assoc($result1);

		if(mysqli_num_rows($result) == 1) {
			$error = "Email already exists!";	
			if(mysqli_num_rows($result1) == 1) {
				$error2 = "Username already taken!";
			}
		}
		elseif(mysqli_num_rows($result1) == 1) {
			$error2 = "Username already taken!";
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
	$success = $success_message;
	$usrnametaken = $error2;
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
			<div>
				<div class="twelve columns menu_bar">
				<a class="button button-primary margin_button" href="index.php">Alloggio</a>
				<a class="button button-primary margin_button" href="about.php">About Us</a>
				</div>
			</div>

			
				<div class="twelve columns reg_form">
					<form method="post" action="">
							
							<h3>Sign Up</h3>
							<p style="color:green;"><?php echo $success; ?></p>
							<p style="color:red;"><?php echo $message; ?></p>
							<p style="color:red;"><?php echo $usrnametaken; ?></p>
							<p class="row">
								<p class="row">
								<label class="space">First Name:</label>
							<input type="text" name="firstname" required>
							<label class="space">Last name:</label>
							<input type="text" name="lastname" required>
								</p>
							</p>
							<label class="space">Address:</label>
							<input type="text" name="address" required>
							<label class="space">Email:</label>
							<input type="email" name="email" required>
							<label class="space">Username:</label>
							<input type="text" name="username" pattern="^[A-Za-z0-9_]{1,15}$" autofocus required title="Should only contain alphanumeric characters and an underscore">
							<label class="space">Password:</label>
							<input type="password" name="password" required>
							<label class="space">Date of Birth:</label>
							<input type="date" name="dob" pattern="" required>

							<br /><br />
							<input type="submit" name="submit" value="submit">
					</form>
				</div>
	</div>

	
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
<?php 
  
    // 5. Close database connection
    mysqli_close($connection);
?>
