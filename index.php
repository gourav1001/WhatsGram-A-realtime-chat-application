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
        <section class="form signup">
            <header>Realtime Chat Application</header>
            <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter your Email" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter a Password" required>
                    <i class="fa-sharp fa-solid fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="displayPic">Upload Image</label>
                    <input type="file" name="displayPic" id="displayPic">
                </div>
                <div class="field button">
                    <input type="submit" value="continue to chat">
                </div>
            </form>
            <div class="link">Already signed up? <a href="./login.php">Login now</a></div>
        </section>
    </div>
    <!-- js -->
    <script src="./js/pass-show-hide.js"></script>
    <script src="./js/signup.js"></script>
</body>

</html>