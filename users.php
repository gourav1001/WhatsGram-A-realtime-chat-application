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
        <section class="users">
            <header>
                <?php
                    // including db configuration
                    include_once "./php/config.php";
                    $query1 = "select * from users where unique_id='{$_SESSION['unique_id']}'";
                    $sql1 = mysqli_query($conn, $query1);
                    if($sql1){// if query executed successfully
                        $row = mysqli_fetch_assoc($sql1);
                    }
                ?>
                <div class="content">
                    <img src="./php/<?php echo $row['img']; ?>" alt='"'.<?php echo $row['fname']; ?>.'"'>
                    <div class="details">
                        <span><?php echo $row['fname']." ".$row['lname']; ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <button class="logout">
                    <i class="fa-solid fa-right-from-bracket fa-fade"></i>
                    <a href="./php/logout.php?user_id=<?php echo $row['unique_id']; ?>">logout</a>
                </button>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter a name to search ...">
                <button><i class="fa-solid fa-magnifying-glass fa-beat-fade"></i></button>
            </div>
            <div class="users-list">
                <!-- dynamically fetched users from the db -->
            </div>
        </section>
    </div>
    <script src="./js/users.js"></script>
</body>

</html>