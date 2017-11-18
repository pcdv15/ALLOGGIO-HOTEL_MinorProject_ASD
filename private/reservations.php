<?php
    require_once("../include/conn.php");

    $sql = "SELECT customer,accom_type,room_num,arrive_depart,num_night,total_paid,booked_date,checkout FROM book_details WHERE checkout = 0 ORDER BY booked_date ASC";
    $query = mysqli_query($connection, $sql);

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

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Reservations</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  
  <link rel="stylesheet" href="../public/css/skeleton.css">
  <link rel="stylesheet" href="../public/css/normalize.css">
  <link rel="stylesheet" href="../public/css/style.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="../public/images/Alloggio_icon.png">

</head>
<body>
<h2 style="text-align: center; margin-top:10%;">All Reservations</h2>
<div style="text-align:center;"><a  class=" status_table" href="admin.php"><button  class="margin_button">Go Back</button></a></div>
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<div class="container" style="margin-top:5%;  position: relative;
    max-width: 80%;
    margin: 0 auto;
    box-sizing: border-box;
    background-color:rgba(0, 105, 92, 0.45);
    border-radius: 5px;">

<div class="twelve columns" style="padding: 1em;">
<table class="data-table">
            <thead>
                <tr>
                    <th>Customer</th>
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
                                <td><?php echo $row['customer']; ?></td>
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
</div>
</body>
</html>
<?php
    mysqli_close($connection);
?>