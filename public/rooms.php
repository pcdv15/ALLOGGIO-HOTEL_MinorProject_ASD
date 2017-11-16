<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Rooms</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="refresh" content="5">

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
            require("../include/header2.html");
        } else {
            require("../include/header1.html");
        }

        $query_1 = "SELECT * FROM rooms order by id asc";
        $result_1 = mysqli_query($connection, $query_1);
        $i = 0;
        while($rooms = mysqli_fetch_assoc($result_1)) { //store query to $rooms
            $row[$i] = $rooms['available'];
            $i++;
        }

        //SUITE
        
        if($row[0] == '1') {
            $r1 = "#32cd32";
        } else {
            $r1 = "red";
        }

        if($row[1] == '1') {
            $r2 = "#32cd32";
        } else {
            $r2 = "red";
        }

        if($row[2] == '1') {
            $r3 = "#32cd32";
        } else {
            $r3 = "red";
        }

        //DELUXE

        if($row[3] == '1') {
            $r4 = "#32cd32";
        } else {
            $r4 = "red";
        }

        if($row[4] == '1') {
            $r5 = "#32cd32";
        } else {
            $r5 = "red";
        }

        if($row[5] == '1') {
            $r6 = "#32cd32";
        } else {
            $r6 = "red";
        }

        if($row[6] == '1') {
            $r7 = "#32cd32";
        } else {
            $r7 = "red";
        }

        if($row[7] == '1') {
            $r8 = "#32cd32";
        } else {
            $r8 = "red";
        }

        //STANDARD

        if($row[8] == '1') {
            $r9 = "#32cd32";
        } else {
            $r9 = "red";
        }

        if($row[9] == '1') {
            $r10 = "#32cd32";
        } else {
            $r10 = "red";
        }

        if($row[10] == '1') {
            $r11 = "#32cd32";
        } else {
            $r11 = "red";
        }

        if($row[11] == '1') {
            $r12 = "#32cd32";
        } else {
            $r12 = "red";
        }

        if($row[12] == '1') {
            $r13 = "#32cd32";
        } else {
            $r13 = "red";
        }

        if($row[13] == '1') {
            $r14 = "#32cd32";
        } else {
            $r14 = "red";
        }
        
        ?>
		<div class="twelve columns reg_form">	
            <h3>Rooms</h3>
            <p>Legend: <br>
                <span style="color:#32cd32;">Green</span>: Available <br>
                <span style="color:red;">Red</span>: Not Available
            </p>
            <p><h5>SUITE</h5></p>
            <p><span style="border: 2px solid <?php echo $r1 ?>;">Room 301</span> <span style="border: 2px solid <?php echo $r2 ?>;">Room 302</span> <span style="border: 2px solid <?php echo $r3 ?>;">Room 303</span></p> <br>
            <p><h5>DELUXE</h5></p>
            <p><span style="border: 2px solid <?php echo $r4 ?>;">Room 201</span> <span style="border: 2px solid <?php echo $r5 ?>;">Room 202</span> <span style="border: 2px solid <?php echo $r6 ?>;">Room 203</span> <span style="border: 2px solid <?php echo $r7 ?>;">Room 204</span> <span style="border: 2px solid <?php echo $r8 ?>;">Room 205</span></p> <br>
            <p><h5>STANDARD</h5></p>
            <p><span style="border: 2px solid <?php echo $r9 ?>;">Room 101</span> <span style="border: 2px solid <?php echo $r10 ?>;">Room 102</span> <span style="border: 2px solid <?php echo $r11 ?>;">Room 103</span> <span style="border: 2px solid <?php echo $r12 ?>;">Room 104</span> <span style="border: 2px solid <?php echo $r13 ?>;">Room 105</span> <span style="border: 2px solid <?php echo $r14 ?>;">Room 106</span></p>
        </div>
	</div>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
