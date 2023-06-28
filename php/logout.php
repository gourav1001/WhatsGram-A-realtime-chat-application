<?php
    // starting user session
    session_start();
    if(isset($_SESSION['user_id'])){ // if user is logged in
        // including db config for updating db
        include_once "./db-config.php";
        // fetching the user id of the user requested for logout
        $logoutUserId = $_GET['user_id'];
        // updating db
        $sql1 = "update users set status = 'Offline now' where user_id = '{$logoutUserId}'";
        $query1 = mysqli_query($conn, $sql1);
        if($query1){// if sql query executed successfully
            // remove and destroy the current session
            session_unset();
            session_destroy();
            // re-direct the user to login page
            header("location: ../index.php");
        }else{
            header("location: ../index.php");
            exit("A fatal server error encountered! Please re-try after sometime!");
        }
    }else{ // re-direct to login page
        header("location: ../index.php");
    }
?>