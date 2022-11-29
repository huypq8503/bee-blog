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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>
    <section>
        <!--Bắt Đầu Phần Hình Ảnh-->
        <div class="img-bg">
            <img src="https://vcdn1-thethao.vnecdn.net/2022/11/20/a-6498-1668903333.jpg?w=680&h=0&q=100&dpr=1&fit=crop&s=hlY6wHQOx_XlwxW4xSKwAQ" alt="Hình Ảnh Minh Họa">
        </div>
        <!--Kết Thúc Phần Hình Ảnh-->
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
            <div class="form">
                <h2>SIGN UP</h2>
                <form action="./site/controller/save-register.php" method="post" enctype="multipart/form-data">
                    <div class="input-form">
                        <span>First Name</span>
                        <input type="text" name="first-name" required>
                    </div>
                    <div class="input-form">
                        <span>Last Name</span>
                        <input type="text" name="last-name" required>
                    </div>
                    <div class="input-form">
                        <span>User Name</span>
                        <input type="text" name="user-name" required>
                    </div>
                    <div class="input-form">
                        <span>Email</span>
                        <input type="text" name="email" required>
                    </div>
                    <div class="input-form">
                        <span>Create password</span>
                        <input type="password" name="password" required>
                    </div>
                    <div class="input-form">
                        <span>Confirm password</span>
                        <input type="password" name="password" required>
                    </div>
                    <div class="input-form">
                        <span>Avatar</span>
                        <input id="file" type="file" name="avatar" required><br>
                    </div>
                    <div class="input-form">
                        <input type="submit" value="Sign Up" name="btn">
                    </div>
                    <div class="input-form">
                        <p>Do you already have an account? <a href="login.php">Sign In</a></p>
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

</body>

</html>