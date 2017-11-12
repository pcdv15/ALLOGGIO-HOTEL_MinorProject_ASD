<?php 
    require("../include/conn.php");

    $sql = "SELECT * FROM rooms 
            WHERE type LIKE '%".$_GET['type']."%' and available = 1";

    $result = mysqli_query($connection, $sql);

    $json = [];
    while($row = mysqli_fetch_assoc($result)) {
        $json[$row['id']] = $row['room_num'];
    }

    echo json_encode($json);
?>