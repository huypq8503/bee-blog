<?php
session_start(); //bắt đầu session

include "./site/model/config.php";
$query = "select * from users";
$users = getAll($query);
foreach ($users as $value) {
    if (isset($_POST["btn-login"])) {
        if (!$_POST["email"] == "" && !$_POST["password"] == "") {
            if ($_POST["email"] == $value["email"] && $_POST["password"] == $value["password"]) {
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["id"] = $value["id"];
                $_SESSION["userName"] = $value["userName"];
                $_SESSION["avatar"] = $value["avatar"];
                header("location:./site/index.php");
            }
        } else {
            echo "Tài khoản không đúng";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <section>
        <!--Bắt Đầu Phần Hình Ảnh-->
        <div class="img-bg">
            <img src="https://niemvuilaptrinh.ams3.cdn.digitaloceanspaces.com/tao_trang_dang_nhap/hinh_anh_minh_hoa.jpg"
                alt="Hình Ảnh Minh Họa">
        </div>
        <!--Kết Thúc Phần Hình Ảnh-->
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
            <div class="form">
                <h2>SIGN IN</h2>
                <form action="" method="POST">
                    <div class="input-form">
                        <span>Email</span>
                        <input type="text" name="email">
                    </div>
                    <div class="input-form">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    <div class="nho-dang-nhap">
                        <label><input type="checkbox" name="password">Remember me</label>
                    </div>
                    <div class="input-form">
                        <input type="submit" value="Sign Up" name="btn-login">
                    </div>
                    <div class="input-form">
                        <p>Don't have an account? <a href="register.php">Sign Up</a></p>
                    </div>
                </form>
                <h3>Register By Social Network</h3>
                <ul class="icon-dang-nhap">
                    <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                    <li><i class="fa fa-google" aria-hidden="true"></i></li>
                    <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                </ul>
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
    <!-- form đăng nhập -->
</body>

</html>