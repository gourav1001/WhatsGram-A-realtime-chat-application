<?php
// starting user session
session_start();
if (!isset($_SESSION['user_id'])) { // if user has not logged in
    header("location: ./index.php"); // re-direct the user to the login page
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
        <div class="wrapper col-lg-4 offset-lg-4 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
            <section class="users">
                <header>
                    <?php
                    // including db configuration
                    include_once "./php/db-config.php";
                    $sql1 = "select * from users where user_id='{$_SESSION['user_id']}'";
                    $query1 = mysqli_query($conn, $sql1);
                    if ($query1) { // if query executed successfully
                        $row = mysqli_fetch_assoc($query1);
                    }
                    ?>
                    <div class="content">
                        <img src="./php/<?php echo $row['img']; ?>" alt=".<?php echo $row['fname']; ?>.">
                        <div class="details">
                            <span class="user-name"><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                            <span class="users-status">
                                <img src="./icons/<?php echo $row['status']; ?>.png" alt="Active now">
                                <p><?php echo $row['status']; ?></p>
                            </span>
                        </div>
                    </div>
                    <button class="logout">
                        <i class="fa-solid fa-right-from-bracket fa-fade"></i>
                        <a href="./php/logout.php?user_id=<?php echo $row['user_id']; ?>">Logout</a>
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
    </div>
    <!-- jquery v3.7.0 js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- bootstrap v5.3.0 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="./js/users.js"></script>
</body>
</html>