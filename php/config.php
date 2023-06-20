<?php
    $conn = mysqli_connect("localhost", "root", "", "chat");
    if (!$conn) {
        echo "Database Not connected!".mysqli_connect_error();
    }
?>
