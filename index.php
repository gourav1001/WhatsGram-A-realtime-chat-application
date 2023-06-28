<?php
// starting php user session
session_start();
if (isset($_SESSION['user_id'])) { // if user is logged in
    // re-direct to the users page
    header("location: ./users.php");
}
// includng header file
include_once "./php/header.php";
?>
<body>
    <div class="container">
        <div class="wrapper col-lg-4 offset-lg-4 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
            <section class="form login">
                <header>
                    <img src="./icons/WhatsGram.png" alt="WhatsGram">
                    <p>WhatsGram</p>
                </header>
                <div class="form-info">* indicates required fields</div>
                <form action="#" method="post" autocomplete="on">
                    <div class="error-txt"></div>
                    <div class="field input">
                        <label for="email" class="form-label">
                            Email
                            <span class="required-field">*</span>
                        </label>
                        <input type="text" name="email" id="email" class="form-control" required placeholder="Enter your Email">
                    </div>
                    <div class="field input">
                        <label for="password" class="form-label">
                            Password
                            <span class="required-field">*</span>
                        </label>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Enter your Password">
                        <i class="fa-sharp fa-solid fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Log in">
                    </div>
                </form>
                <div class="link">Not yet registered ? <a href="./signup.php">Signup now</a></div>
            </section>
        </div>
    </div>
    <!-- jquery v3.7.0 js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- bootstrap v5.3.0 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="./js/pass-show-hide.js"></script>
    <script src="./js/login.js"></script>
</body>
</html>