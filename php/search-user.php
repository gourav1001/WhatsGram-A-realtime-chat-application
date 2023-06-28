<?php
    // starting user session
    session_start();
    // including db config
    include_once "./db-config.php";
    // fetching search key
    $searchKey = mysqli_escape_string($conn, $_POST['searchKey']);
    // quering the db
    $sql1 = "select * from users where ((fname like '%{$searchKey}%' or lname like '%{$searchKey}%') or (concat(fname, ' ', lname) like '%{$searchKey}%')) and not user_id = '{$_SESSION['user_id']}'";
    $query1 = mysqli_query($conn, $sql1);
    if($sql1){// if query executed successfully
        if(mysqli_num_rows($query1) > 0){ //user exists
            // fetch and send users info to ajax
            include "./fetch-users.php";
        }else{
            echo "No user found";
        }
    }else{
        exit("A fatal server error encountered! Please re-try after sometime!");
    }
?>