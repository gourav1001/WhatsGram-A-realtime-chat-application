<?php
    // starting user session
    session_start();
    // including db config file
    include_once "./config.php";
    // fetching all users from the db except the current user
    $query1 = "select * from users where not unique_id = {$_SESSION['unique_id']}";
    $sql1 = mysqli_query($conn, $query1);
    if($sql1){// if query executed succesfully
        if(mysqli_num_rows($sql1) === 1){// only single user exists in the system
            echo "No users are available for chat";
        }elseif(mysqli_num_rows($sql1) > 1){
            // fetch and send users info to ajax
            include "./fetchUserDataFromDb.php";
        }
    }else{
        exit("A fatal server encountered! Please re-try after sometime!");
    }
?>