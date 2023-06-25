<?php
    // fetching all the users from the db
    $users="";
    while($row = mysqli_fetch_assoc($sql1)){ // for each user
        // fetch the last chat message for the user
        $query2 = "select * from messages where (outgoing_msg_id = {$_SESSION['unique_id']} and incoming_msg_id = {$row['unique_id']})
                    or (outgoing_msg_id = {$row['unique_id']} and incoming_msg_id = {$_SESSION['unique_id']}) order by msg_id desc limit 1";
        $sql2 = mysqli_query($conn, $query2);
        // formatting the message for displaying
        if(mysqli_num_rows($sql2) > 0){// if chat exists
            $message = "";
            if(($tuple = mysqli_fetch_assoc($sql2))['outgoing_msg_id'] === $_SESSION['unique_id']){// if the last message sender is the current user then append you at the beggining
                $message = "You: ";
            }
            // trimming and limiting the length within 30 characters
            $message .= (strlen($tuple['message']) > 27)? substr($tuple['message'], 0, 27)."..." : $tuple['message'];
        }else{// if no chat exists
            $message = "No messages available";
        }
        // css for user online status
        $status = ($row['status'] === 'Offline now')? "offline": "";
        $users .= '<a href="./chat.php?user_id='.$row['unique_id'].'">
                    <div class="content">
                        <img src="./php/'.$row['img'].'" alt="'.$row['fname'].'">
                        <div class="details">
                            <span>'.$row['fname']." ".$row['lname'].'</span>
                            <p>'.$message.'</p>
                        </div>
                    </div>
                    <div class="status-dot '.$status.'">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                </a>';
    }
    // sending the users info for displaying
    echo $users;
?>