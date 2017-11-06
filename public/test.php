<?php
    include('../include/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Welcome to Allogio Hotel, <?php echo $_SESSION['logined_user'] ?></p>
    <br><br>
    <a href="logout.php">Logout?</a>
</body>
</html>