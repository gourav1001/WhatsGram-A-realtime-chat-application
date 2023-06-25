<?php
    // starting user session
    session_start();
    if(isset($_SESSION['unique_id'])){// user is logged in
        // including db config for mysql database connection
        include_once "config.php";
        // fecthing message request
        $sender_id = mysqli_real_escape_string($conn, $_POST['sender_id']);
        $receiver_id = mysqli_real_escape_string($conn, $_POST['receiver_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        // updating the message records
        if(!empty($message)){// if messsages exists then insert into db
            $query1 = "insert into messages(incoming_msg_id, outgoing_msg_id, message) values({$receiver_id}, {$sender_id}, '{$message}')";
            $sql1 = mysqli_query($conn, $query1) or die("A fatal server error encountered! Please try after sometime");
            if($sql1){// if query executed successfully
                echo "success";
            }else{
                echo "failure";
                exit("A fatal server error encountered! Please try after sometime");
            }
        }
    }else{// user is not logged in
        header('location: ./login.php');
    }
?>