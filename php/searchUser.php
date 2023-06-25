<?php
    // starting user session
    session_start();
    // including db config
    include_once "./config.php";
    // fetching search key
    $searchKey = mysqli_escape_string($conn, $_POST['searchKey']);
    // quering the db
    $query1 = "select * from users where ((fname like '%{$searchKey}%' or lname like '%{$searchKey}%') or (concat(fname, ' ', lname) like '%{$searchKey}%')) and not unique_id = {$_SESSION['unique_id']}";
    $sql1 = mysqli_query($conn, $query1);
    if($sql1){// if query executed successfully
        if(mysqli_num_rows($sql1) > 0){ //user exists
            // fetch and send users info to ajax
            include "./fetchUserDataFromDb.php";
        }else{
            echo "No user found";
        }
    }else{
        exit("A fatal server error encountered! Please re-try after sometime!");
    }
?>