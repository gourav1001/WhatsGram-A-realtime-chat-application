<?php
    // starting user session
    session_start();
    if(isset($_SESSION['unique_id'])){ // if user is logged in
        // including db config for updating db
        include_once "./config.php";
        // fetching the user id of the user requested for logout
        $logoutUserId = $_GET['user_id'];
        // updating db
        $query1 = "update users set status = 'Offline now' where unique_id = $logoutUserId";
        $sql1 = mysqli_query($conn, $query1);
        if($sql1){// if sql query executed successfully
            // remove and destroy the current session
            session_unset();
            session_destroy();
            // re-direct the user to login page
            header("location: ../login.php");
        }else{
            header("location: ../login.php");
            exit("A fatal server error encountered! Please re-try after sometime!");
        }
    }else{ // re-direct to login page
        header("location: ../login.php");
    }
?>