<?php
    // starting user session
    session_start();
    // including db config file
    include_once "./db-config.php";
    // fetching all users from the db except the current user
    $sql1 = "select * from users where not user_id = '{$_SESSION['user_id']}' order by fname";
    $query1 = mysqli_query($conn, $sql1);
    if($query1){// if query executed succesfully
        if(mysqli_num_rows($query1) === 1){// only single user exists in the system
            echo "No users are available for chat";
        }elseif(mysqli_num_rows($query1) > 1){
            // fetch and send users info to ajax
            include "./fetch-users.php";
        }
    }else{
        exit("A fatal server encountered! Please re-try after sometime!");
    }
?>