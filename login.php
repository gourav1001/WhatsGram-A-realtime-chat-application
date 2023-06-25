<?php
    // starting php user session
    session_start();
    if(isset($_SESSION['unique_id'])){// if user is logged in
        // re-direct to the users page
        header("location: ./users.php");
    }
    // includng header file
    include_once "./php/header.php";
?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat Application</header>
            <form action="#" method="post" autocomplete="off">
                <div class="error-txt"></div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required placeholder="Enter your Email">
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required placeholder="Enter your Password">
                    <i class="fa-sharp fa-solid fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="continue to chat">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="./index.php">Signup now</a></div>
        </section>
    </div>
    <!-- js -->
    <script src="./js/pass-show-hide.js"></script>
    <script src="./js/login.js"></script>
</body>

</html>