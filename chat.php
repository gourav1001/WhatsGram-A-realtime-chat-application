<?php
    // starting user session
    session_start();
    if(!isset($_SESSION['unique_id'])){// if user has not logged in
        header("location: ./login.php"); // re-direct the user to the login page
    }
?>

<?php
    // includng header file
    include_once "./php/header.php";
?>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
                    // including db configuration
                    include_once "./php/config.php";
                    // getting the user id of the user selected for chat
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    $query1 = "select * from users where unique_id='{$user_id}'";
                    $sql1 = mysqli_query($conn, $query1);
                    if($sql1){// if query executed successfully
                        $row = mysqli_fetch_assoc($sql1);
                    }else{
                        exit("A fatal server encountered! Please re-try after sometime!");
                    }
                ?>
                <a href="./users.php" class="back-icon"><i class="fa-solid fa-arrow-left"></i></a>
                <img src="./php/<?php echo $row['img']; ?>" alt='"'.<?php echo $row['fname']; ?>.'"'>
                <div class="details">
                    <span><?php echo $row['fname']." ".$row['lname']; ?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </header>
            <div class="chat-box">
                <!-- dynamic chat history fetched from mysql db  -->
            </div>
            <form action="#" method="post" class="typing-area" autocomplete="off">
                <input type="text" name="sender_id" hidden value="<?php echo $_SESSION['unique_id']; ?>">
                <input type="text" name="receiver_id" hidden value="<?php echo $user_id; ?>">
                <input type="text" name="message" class="input-msg" placeholder="Type your message here ...">
                <button><i class="fa-brands fa-telegram fa-shake"></i></button>
            </form>
        </section>
    </div>
    <script src="./js/chat.js"></script>
</body>

</html>