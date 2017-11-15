<?php
    include('../include/session.php');

    $errmessage = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['roomnum'] = $_POST['roomnum'];
        $_SESSION['checkin_date'] = $_POST["checkin"];
        $_SESSION['checkout_date'] = $_POST["checkout"];

        $date1 = date_create($_POST["checkin"]);
        $date2 = date_create($_POST["checkout"]);
        
        //difference between two dates
        $diff = date_diff($date1,$date2);
        $diff = $diff->format("%a");

        $_SESSION['totalnights'] = $diff;

        if($diff == '0') {
            $errmessage = "Check out date must not be the same with check in";
        } else {
            header("Location: confirm.php");
        }

    }

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
    
<div class=" twelve columns reg_form">
<form  action="" method="post">

    <h5>Room Type </h5>
    <p style="color:red;"><?php echo $errmessage; ?></p>
<select name="roomtype" required>
    
    <option value="">--- Select Room Type ---</option>
  <option value="VIP">Suite</option>
  <option value="DELUXE">Deluxe</option>
  <option value="STANDARD">Standard</option>
</select>


<p>
    <h5>Room Number</h5>
<select name="roomnum" required>

</select>
</p>

<p>
    <h5>Check In</h5>
    <input type="date"  name="checkin" value="<?php if(isset($_SESSION['checkin_date'])){ echo $_SESSION['checkin_date'];} else {echo date("Y-m-d");}?>" min="<?php echo date("Y-m-d"); ?>" required>
</p>
<p>    <h5>Check Out</h5>
    
	<input type="date"  name="checkout" min="<?php $date = date("Y-m-d"); $date = strtotime("$date + 1 day"); $date = date("Y-m-d", $date); echo $date;?>" value="<?php if(isset($_SESSION['checkout_date'])){ echo $_SESSION['checkout_date'];} else {echo $date;}  ?>"  required></p>
    
<input  type="submit" name="submit" value="Next"/>
</form>
</div>

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