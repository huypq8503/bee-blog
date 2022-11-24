<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../public/css/sidebar.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!--<title>Dashboard Sidebar Menu</title>-->

    <>
        /* Google Font Import - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <a href="./index.php"> <img src="../public/image/logo-bee-blog.png" alt=""></a>
                </span>

                <div class="text logo-text">
                    <span class="name">Bee-Blog</span>
                    <span class="profession">Group 8</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">

                <li class="menu-links">
                    <a href="./index.php">
                        <i class='bx bx-home icon'></i>
                        <span class="text nav-text">Trang chủ</span>
                    </a>
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="./view/post-manager.php">
                            <i class='bx bx-shopping-bag icon'></i>
                            <span class="text nav-text">Quản lý post</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./view/podcast-manager.php">
                            <i class='bx bx-headphone icon'></i>
                            <span class="text nav-text">Quản lý podcast</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./view/category-manager.php">
                            <i class='bx bx-category icon'></i>
                            <span class="text nav-text">Quản lý danh mục</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./view/user-manager.php">
                            <i class='bx bx-user-circle icon'></i>
                            <span class="text nav-text">Quản lý tài khoản</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./view/comment-manager.php">
                            <i class='bx bx-comment icon'></i>
                            <span class="text nav-text">Quản lý bình luận</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../view/statistical-show.ph">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Thống kê</span>
                        </a>
                    </li>
                    <div class="bottom-content">
                        <li class="mode">
                            <div class="sun-moon">
                                <i class='bx bx-moon icon moon'></i>
                                <i class='bx bx-sun icon sun'></i>
                            </div>
                            <span class="mode-text text">Dark mode</span>

                            <div class="toggle-switch">
                                <span class="switch"></span>
                            </div>
                        </li>

                    </div>
            </div>

    </nav>

    <section class="home">
    </section>

    <script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");


    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    })

    searchBtn.addEventListener("click", () => {
        sidebar.classList.remove("close");
    })

    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            modeText.innerText = "Light mode";
        } else {
            modeText.innerText = "Dark mode";

        }
    });
    </script>

</body>

</html>