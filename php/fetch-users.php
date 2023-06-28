<?php
    // fetching all the users from the db
    $users="";
    while($row = mysqli_fetch_assoc($query1)){ // for each user
        // fetch the last chat message for the user
        $sql2 = "select * from messages where (outgoing_msg_id = '{$_SESSION['user_id']}' and incoming_msg_id = '{$row['user_id']}')
                    or (outgoing_msg_id = '{$row['user_id']}' and incoming_msg_id = '{$_SESSION['user_id']}') order by timestamp desc limit 1";
        $query2 = mysqli_query($conn, $sql2);
        // formatting the message for displaying
        if(mysqli_num_rows($query2) > 0){// if chat exists
            $message = "";
            if(($tuple = mysqli_fetch_assoc($query2))['outgoing_msg_id'] === $_SESSION['user_id']){// if the last message sender is the current user then append you at the beggining
                $message = "You: ";
            }
            // trimming and limiting the length within 30 characters
            $message .= (strlen($tuple['message']) > 27)? substr($tuple['message'], 0, 27)."..." : $tuple['message'];
        }else{// if no chat exists
            $message = "No messages available";
        }
        // css for user online status
        $status = ($row['status'] === 'Offline now')? "offline": "";
        $users .= '<a href="./chat.php?user_id='.$row['user_id'].'">
                    <div class="content">
                        <span class="user-display-pic"><img src="./php/'.$row['img'].'" alt="'.$row['fname'].'"></span>
                        <div class="details">
                            <span>'.$row['fname']." ".$row['lname'].'</span>
                            <p>'.$message.'</p>
                        </div>
                    </div>
                    <span class="users-status">
                            <img src="./icons/'.$row['status'].'.png" alt="'.$row['status'].'">
                    </span>
                </a>';
                // old styling
                // <div class="status-dot '.$status.'">
                //                         <i class="fa-solid fa-circle"></i>
                // </div>
    }
    // sending the users info for displaying
    echo $users;
?>