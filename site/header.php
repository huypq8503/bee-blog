<?php
include "./model/config.php";
session_start();
if (empty($_SESSION["id"])) {
    header("location:../login.php");
};
// var_dump($_SESSION);
// die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Oswald:400);

    .user-sign img {
        /* width: 60px;
        height: 60px; */
        background: none;
        border: 0.1875em solid #0F1C3F;
        border-radius: 50%;
        box-shadow: 0.375em 0.375em 0 0 rgba(15, 28, 63, 0.125);
        height: 3em;
        width: 3em;

    }

    header {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
    }

    .logo img {
        width: 150px;
        height: 150px;
    }

    li {
        display: inline-block;
        padding: 0px 10px;
    }

    a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        color: #e8cd00;
    }

    .user button {
        margin-left: 0px;
        border-radius: 10px;
        border: 1px solid black;
        background-color: wheat;
        color: #a35be3;
    }

    .user button:hover {
        background-color: #e8cd00;
    }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="../public/image/logo-bee-blog.png" alt="">
            </div>
            <menu>
                <ul>
                    <li><a href="index.php">BLOG</a></li>
                    <li><a href="#">PODCAST</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICES</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="../admin/index.php">DASHBOARD</a></li>
                </ul>
            </menu>
            <div class="user">
                <?php //bắt đầu session
                if (isset($_SESSION["email"])) {
                    echo "<div class='user-sign'>";
                    // echo "<a class ='button' href=";
                    echo "<div class='avatar'><img src='../public/image/";
                    echo $_SESSION["avatar"];
                    echo "'></div>";
                    echo "</div>";
                    echo "<div class='logout'>";
                    echo "<a href='./controller/logout.php'onclick='return alert('Bạn chắc chắn muốn đăng xuất chứ ?')'> <button>Logout</button>"; //thẻ a điều hướng sang logout.php trong thư mục controller để xử lý việc logout
                    echo "</a>";
                    echo "</div>";
                    echo "</div>";
                }
                // var_dump($_SESSION);
                // die;
                ?>

            </div>
        </header>
    </div>
</body>

</html>