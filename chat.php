<?php
// starting user session
session_start();
if (!isset($_SESSION['user_id'])) { // if user has not logged in
    header("location: ./login.php"); // re-direct the user to the login page
}
?>
<?php
// includng header file
include_once "./php/header.php";
?>
<body>
    <!-- page spinner loader -->
    <div id="pageLoadSpinnerWrapper">
        <div class="justify-content-center">
            <div id="pageLoadSpinner" class="spinner-border text-primary" role="status"></div>
            <p>Loading ...</p>
        </div>
    </div>
    <div class="container">
        <div class="wrapper col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
            <section class="chat-area">
                <header>
                    <?php
                    // including db configuration
                    include_once "./php/db-config.php";
                    // getting the user id of the user selected for chat
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    $sql1 = "select * from users where user_id = '{$user_id}'";
                    $query1 = mysqli_query($conn, $sql1);
                    if ($query1) { // if query executed successfully
                        $row = mysqli_fetch_assoc($query1);
                    } else {
                        exit("A fatal server encountered! Please re-try after sometime!");
                    }
                    ?>
                    <a href="./users.php" class="back-icon"><i class="fa-solid fa-arrow-left"></i></a>
                    <img src="./php/<?php echo $row['img']; ?>" alt='"' .<?php echo $row['fname']; ?>.'"'>
                    <div class="details">
                        <span class="user-name"><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                        <span class="user-status">
                            <img src="./icons/<?php echo $row['status']; ?>.png" alt="<?php echo $row['status']; ?>">
                            <p><?php echo $row['status']; ?></p>
                        </span>
                    </div>
                </header>
                <div class="chat-box">
                    <!-- dynamic chat history fetched from mysql db  -->
                </div>
                <form action="#" method="post" class="typing-area" autocomplete="off">
                    <input type="text" name="sender_id" hidden value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="text" name="receiver_id" hidden value="<?php echo $user_id; ?>">
                    <input type="text" name="message" class="input-msg" placeholder="Type your message here ...">
                    <button><i class="fa-brands fa-telegram fa-shake"></i></button>
                </form>
            </section>
        </div>
    </div>
    <!-- jquery v3.7.0 js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- bootstrap v5.3.0 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="./js/chat.js"></script>
</body>
</html>