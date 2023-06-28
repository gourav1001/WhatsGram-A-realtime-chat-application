<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "whatsgram";
    $conn = mysqli_connect($hostname, $username, $password, $database);
    if (!$conn) {
        echo "Database connectivity error! ".mysqli_connect_error();
    }
?>
