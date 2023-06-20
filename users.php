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
        <section class="users">
            <header>
                <div class="content">
                    <img src="./profilepic.jpg" alt="">
                    <div class="details">
                        <span>Gourav Nag</span>
                        <p>Active Now</p>
                    </div>
                </div>
                <button class="logout">
                    <i class="fa-solid fa-right-from-bracket fa-fade"></i>
                    <a href="#">logout</a>
                </button>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter a name to search ...">
                <button><i class="fa-solid fa-magnifying-glass fa-beat-fade"></i></button>
            </div>
            <div class="users-list">
                <a href="#">
                    <div class="content">
                        <img src="./profilepic.jpg" alt="">
                        <div class="details">
                            <span>Gourav Nag</span>
                            <p>Test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="./profilepic.jpg" alt="">
                        <div class="details">
                            <span>Gourav Nag</span>
                            <p>Test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="./profilepic.jpg" alt="">
                        <div class="details">
                            <span>Gourav Nag</span>
                            <p>Test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="./profilepic.jpg" alt="">
                        <div class="details">
                            <span>Gourav Nag</span>
                            <p>Test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="./profilepic.jpg" alt="">
                        <div class="details">
                            <span>Gourav Nag</span>
                            <p>Test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="./profilepic.jpg" alt="">
                        <div class="details">
                            <span>Gourav Nag</span>
                            <p>Test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="./profilepic.jpg" alt="">
                        <div class="details">
                            <span>Gourav Nag</span>
                            <p>Test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                </a>
            </div>
        </section>
    </div>
    <script src="./js/users-search.js"></script>
</body>

</html>