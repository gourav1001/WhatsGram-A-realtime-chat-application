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
            <section class="form signup">
                <header>
                    <img src="./icons/WhatsGram.png" alt="WhatsGram">
                    <p>WhatsGram</p>
                </header>
                <div class="form-info">* indicates required fields</div>
                <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="error-txt"></div>
                    <div class="name-details">
                        <div class="field input">
                            <label for="fname" class="form-label">
                                First Name
                                <span class="required-field">*</span>
                            </label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="field input">
                            <label for="lname" class="form-label">
                                Last Name
                                <span class="required-field">*</span>
                            </label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label for="email" class="form-label">
                            Email
                            <span class="required-field">*</span>
                        </label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your Email" required>
                    </div>
                    <div class="field input" class="form-label">
                        <label for="password">
                            Password
                            <span class="required-field">*</span>
                        </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter a Password" required>
                        <i class="fa-sharp fa-solid fa-eye"></i>
                    </div>
                    <div class="field input">
                        <label for="password" class="form-label">
                            Confirm Password
                            <span class="required-field">*</span>
                        </label>
                        <input type="password" name="confirmedPassword" id="password" class="form-control" placeholder="Re-enter your Password" required>
                        <i class="fa-sharp fa-solid fa-eye"></i>
                    </div>
                    <div class="image">
                        <label for="displayPic" class="form-label">
                            Upload Profile Image
                            <span class="required-field">*</span>
                        </label>
                        <input type="file" name="displayPic" id="displayPic" class="form-control form-control-sm">
                        <span class="display-pic-info">** Only .jpeg, .jpg, .png format within 200kb allowed</span>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Register">
                    </div>
                </form>
                <div class="link">Already registered ? <a href="./index.php">Login now</a></div>
            </section>
        </div>
    </div>
    <!-- jquery v3.7.0 js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- sweetalert v11.7.12 js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js" integrity="sha256-2Dbg51yxfa7qZ8CSKqsNxHtph8UHdgbzxXF9ANtyJHo=" crossorigin="anonymous"></script>
    <!-- bootstrap v5.3.0 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="./js/pass-show-hide.js"></script>
    <script src="./js/signup.js"></script>
</body>
</html>