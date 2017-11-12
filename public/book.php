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
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>

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
<form method="post" action="">
<p>
    <h5>Room Type</h5>
<select name="roomtype" required>
    <option value="">--- Select Room Type ---</option>
  <option value="VIP">Suite</option>
  <option value="DELUXE">Deluxe</option>
  <option value="STANDARD">Standard</option>
</select>
</p>

<p>
    <h5>Room Number</h5>
<select name="roomnum" required>

</select>
</p>

<div class=" u-cf">
    <label>Check In</label>
	<input type="text" placeholder="MM" name="checkin_month" class="checkin" required>
	<input type="text" placeholder="DD" name="checkin_day" class="checkin" required>
	<input type="text" placeholder="YYYY" name="checkin_year" class="checkin year" required> 
	<label>Check Out</label>
	<input type="text" placeholder="MM" name="checkout_month" class="checkin" required>
	<input type="text" placeholder="DD" name="checkout_day" class="checkin" required>
	<input type="text" placeholder="YYYY" name="checkout_year" class="checkin year" required>
</div>
<br>

<input type="submit" name="submit" value="Next"/>
</form>

<script>
    $( "select[name='roomtype']" ).change(function () {
        var room_type = $(this).val();

        if(room_type) {
            $.ajax({
                url: "ajax.php",
                dataType: 'Json',
                data: {'type':room_type},
                success: function(data) {
                    $('select[name="roomnum"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="roomnum"]').append('<option value="'+ key +'">'+ value + '</option>');
                    });
                }
            });
        }else{
            $('select[name="roomnum"').empty();
        }
    });
</script>
</body>
</html>