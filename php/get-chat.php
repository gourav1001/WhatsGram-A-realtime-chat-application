<?php
    // starting user session
    session_start();
    if(isset($_SESSION['user_id'])){// user is logged in
        // including db config for mysql database connection
        include_once "./db-config.php";
        // fecthing message request
        $sender_id = mysqli_real_escape_string($conn, $_POST['sender_id']);
        $receiver_id = mysqli_real_escape_string($conn, $_POST['receiver_id']);
        $chatHist = "";
        // fetching messages from the db
        $sql1 = "select * from messages
                    left join users on users.user_id = messages.outgoing_msg_id
                    where (outgoing_msg_id = '{$sender_id}' and incoming_msg_id = '{$receiver_id}') or 
                    (outgoing_msg_id = '{$receiver_id}' and incoming_msg_id = '{$sender_id}') order by timestamp";
        $query1 = mysqli_query($conn, $sql1);
        // formatting chats for display
        if(mysqli_num_rows($query1) > 0){
            while($row = mysqli_fetch_assoc($query1)){// fetching each tuple
                if($row['outgoing_msg_id'] === $sender_id){ // outgoing message sent by sender to receiver
                    $chatHist .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.$row['message'].'</p>
                                    </div>
                                </div>';
            }else{ // incoming message sent by receiver to sender
                $chatHist .= '<div class="chat incoming">
                                <img src="./php/'.$row['img'].'" alt="'.$row['fname'].'">
                                <div class="details">
                                    <p>'.$row['message'].'</p>
                                </div>
                            </div>';
                }
            }
        }
        echo $chatHist;
    }else{// user is not logged in
        header('location: ./login.php');
    }
?>