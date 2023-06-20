<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- fontawesome v6.4.0 css cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Realtime Chat Application</title>
</head>

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