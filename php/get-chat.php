<?php
    // starting user session
    session_start();
    if(isset($_SESSION['unique_id'])){// user is logged in
        // including db config for mysql database connection
        include_once "config.php";
        // fecthing message request
        $sender_id = mysqli_real_escape_string($conn, $_POST['sender_id']);
        $receiver_id = mysqli_real_escape_string($conn, $_POST['receiver_id']);
        $chatHist = "";
        // fetching messages from the db
        $query1 = "select * from messages
                    left join users on users.unique_id = messages.outgoing_msg_id
                    where (outgoing_msg_id = {$sender_id} and incoming_msg_id = {$receiver_id}) or 
                    (outgoing_msg_id = {$receiver_id} and incoming_msg_id = {$sender_id}) order by msg_id";
        $sql1 = mysqli_query($conn, $query1);
        // formatting chats for display
        if(mysqli_num_rows($sql1) > 0){
            while($row = mysqli_fetch_assoc($sql1)){// fetching each tuple
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