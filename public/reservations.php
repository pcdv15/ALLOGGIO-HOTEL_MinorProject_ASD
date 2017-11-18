<?php
    include('../include/session.php');
    require_once("../include/conn.php");
    $error = "";
    $success_message = "";

    $uid = $_SESSION['uid'];
    $sql = "SELECT accom_type,room_num,arrive_depart,num_night,total_paid,booked_date,checkout FROM book_details WHERE uid = $uid ORDER BY booked_date ASC";
    $query = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($query);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $rnum = $_POST["roomnum"];

        $update_chkout = mysqli_query($connection, "UPDATE book_details SET checkout=1 WHERE room_num = $rnum");
        if($update_chkout) {
            $update_roomavailability = mysqli_query($connection, "UPDATE rooms SET available=1 WHERE room_num = $rnum");
                if($update_roomavailability) {
                    header("Refresh:0");
                }
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
    
    <div class="twelve columns space container" style="padding-left:1em;padding-right:1em;padding-top:1em;">
        <h4>Reservations</h4>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Accommodation Type</th>
                    <th>Room Number</th>
                    <th>Arrival - Departure</th>
                    <th>Total Nights</th>
                    <th>Amount Paid</th>
                    <th>Booking Date</th>
                    <th>Status</th>
                </tr>
            </thead>


            <tbody>
                <?php
                    $room_num = array();


                    $i = 0;
                    $total = 0;
                    while($row = mysqli_fetch_assoc($query)) {
                        $room_num[] = $row['room_num'];
                        ?>
                            <tr>
                                <td><?php echo $row['accom_type']; ?></td>
                                <td><?php echo $row['room_num'];?></td>
                                <td><?php echo $row['arrive_depart'];?></td>
                                <td><?php echo $row['num_night'];?></td>
                                <td><?php echo "P ".$row['total_paid'];?></td>
                                <td><?php echo $row['booked_date'];?></td>
                                <td><form action="" method="post"><input type="hidden" name="roomnum" value="<?php echo $room_num[$i]; ?>"><input style="margin-top: 15px;" type="submit" name="checkout" value="<?php if($row['checkout'] == 0) { echo "Check Out";} else{ echo "Checked Out!";} ?>" <?php if($row['checkout'] == 0) { echo "";} else{ echo "disabled";} ?>></form></td>
                    </tr>
                      <?php 
                      $i++;
                    }
                    ?>
            </tbody>

            
        
        </table>
                    
    </div>


</body>
</html>
<?php 
    mysqli_close($connection);
?>