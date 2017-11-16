<?php
    include('../include/session.php');
    require_once("../include/conn.php");
    $error = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $roomnum = $_SESSION['roomnum'];
      $query = "SELECT available FROM rooms WHERE room_num = $roomnum";
      $result = mysqli_query($connection, $query);
      $available = mysqli_fetch_assoc($result);
      //echo $available['available'];

      //check if room is still available
      if($available['available'] == 1) {
        //save book details to db, set availability of the room selected into N/A, go back to dashboard
      } else {
        $error = "Room already taken. Please choose another room.";
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Confirmation</title>
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
    
    <div class="twelve columns space container" style="padding-left:2em;padding-top:1em;">
      <h5>Reservation Details</h5>
      <p>
        <b>Property Name: &nbsp;</b> ALLOGGIO HOTEL <br>
        <b>Accommodation Type: &nbsp;</b><?php echo $_SESSION['roomtype'];?> <br>
        <b>Room Number: &nbsp;</b><?php echo $_SESSION['roomnum']; ?> <br>
        <b>Arrive/Depart: &nbsp;</b><?php echo date("D M jS, Y", strtotime($_SESSION['checkin_date']))." - ".date("D M jS, Y", strtotime($_SESSION['checkout_date'])) ?> <br>
        <b>Number of Nights: &nbsp;</b><?php echo $_SESSION['totalnights']; ?> <br>
        <b>Room Rate: &nbsp;</b><?php echo "PHP ".$_SESSION['rate']." x ".$_SESSION['totalnights']." "; if($_SESSION['totalnights'] == 1) {echo "Night"; }else{echo "Nights";}  ?> <br>
        <b>Total Payable: &nbsp;</b><?php echo "PHP ".$_SESSION['rate']*$_SESSION['totalnights']; ?> <br>
        <a href="book.php"><button class="space">EDIT</button></a>
         <a href="dashboard.php"><button class="space">CANCEL</button></a>
        <form action="" method="post">
          <input type="text" placeholder="Credit card number" pattern="\d{12,12}" title="Numeric input only. Valid card length is 12 numbers" required>
          <p style="color:red;"><?php echo $error; ?></p>
          <input type="submit" value="CONFIRM">
        </form>
      </p>
    </div>


</body>
</html>
<?php 
    mysqli_close($connection);
?>