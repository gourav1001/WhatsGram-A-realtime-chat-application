<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- fontawesome v6.4.0 css cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Realtime Chat Application</title>
</head>

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