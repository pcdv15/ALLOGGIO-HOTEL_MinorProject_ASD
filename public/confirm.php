<?php
    include('../include/session.php');
    require_once("../include/conn.php");
    $error = "";
    $success_message = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $roomnum = $_SESSION['roomnum'];
      $uid =  $_SESSION['uid'];
      $query = "SELECT available FROM rooms WHERE room_num = $roomnum";
      $result = mysqli_query($connection, $query);
      $available = mysqli_fetch_assoc($result);
      //echo $available['available'];

      //check if room is still available
      if($available['available'] == 1) {
        //save book details to db, set availability of the room selected into N/A, go back to dashboard
        $query1 = "SELECT firstname, lastname FROM userinfo where id = $uid";
        $result1 = mysqli_query($connection, $query1);
        $customer = mysqli_fetch_assoc($result1);
        $fname = $customer['firstname'];
        $lname = $customer['lastname'];
        
        $name = $fname." ".$lname;
        $accom_type = $_SESSION['roomtype'];
        $arr_dep = date("D M jS, Y", strtotime($_SESSION['checkin_date']))." - ".date("D M jS, Y", strtotime($_SESSION['checkout_date']));
        $num_night = $_SESSION['totalnights'];
        $total_paid = $_SESSION['rate']*$_SESSION['totalnights'];
        $credit_card = $_POST["card"];
        //insert into book_details
        $insertdb = mysqli_query($connection, "INSERT INTO book_details (customer, uid, accom_type, room_num, arrive_depart, num_night, total_paid, checkout, booked_date, creditcard_num) VALUES ('$name', $uid, '$accom_type', $roomnum, '$arr_dep', $num_night, $total_paid,  0, CURRENT_TIMESTAMP, $credit_card)");

        if($insertdb) {
          $success_message = "Reservation successful!";
          //change room availability
          $updateroom = mysqli_query($connection, "UPDATE rooms SET available=0 WHERE room_num = $roomnum");
        }else {
          echo mysqli_error($connection);
        }
        } else {
        $error = "Room already taken. Please choose another room.";
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
  $success = $success_message;
?>
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
      <p style="color:green;"><?php echo $success; ?></p>
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
          <input type="text" name="card" placeholder="Credit card number" pattern="\d{12,12}" title="Numeric input only. Valid card length is 12 numbers" required>
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