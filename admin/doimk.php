<?php
session_start();
require_once './model/config.php';
$loi = "";
$id = $_SESSION['id'];
// Sẽ cần truy vấn -> cần biến $connect để thực thi -> require_once('db.php');
if (isset($_POST['btn']) == true) {
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $newpassword_2 = $_POST['newpassword_1'];
    // $sql = "SELECT * FROM users WHERE password=?";
    // $statement = $connect->prepare($sql);
    // $statement->execute();
    $connection = new PDO("mysql:host=localhost;dbname=bee-blog;charset=utf8", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users where password = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$password]);
    //$users = getOne($query);
    if ($stmt->rowCount() == 0) {
        $loi .= "mật khẩu sai<br>";
    } else if (strlen($newpassword < 6)) {
        $loi .= "mật khẩu quá ngắn";
    } else if ($newpassword != $newpassword_2) {
        $loi .= "mật khẩu không trùng khớp";
    }
    if ($loi == "") {
        $sql = "UPDATE users SET password = ? WHERE id=$id";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$newpassword]);
        $loi .= "thay đổi mật khẩu thành công";
    }
    // return false;
}
// 
?>

<?php
if (empty($_SESSION["id"])) {
    header("location:../login.php");
};
$query = "select * from post";
$post = getAll($query);
$query = "select * from category";
$categoryList = getAll($query);
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
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Oswald:400);
    </style>

    <style>
        .chung {
            display: grid;
            grid-template-columns: 25% 45% 30%;
        }

        .menu {
            height: 100%;
            margin-left: 20px;
            border-right: 1px solid #008B00;

        }

        .a1 {
            display: grid;
            grid-template-columns: 30% 70%;
            margin-top: 30px;
        }

        .a1 svg {
            margin-left: 40%;
        }

        .a2 {
            font-size: 25px;
        }

        .a2:hover {
            color: #008B00;
        }

        .menu_logo {
            margin-left: 30%;
            margin-top: -20px;
        }

        .mat_khau {
            padding-top: 70px;
            padding-left: 100px;
        }

        .mat_khau h1 {
            font-size: 30px;
        }

        .mat_khau small {
            font-size: 20px;
        }

        .mat_khau form input {
            width: 60%;
            height: 30px;
        }

        .mat_khau form label {
            margin-top: 200px;
        }

        .img {
            text-align: center;
            margin-top: 5%;
            margin-right: 10%;
        }
    </style>

</head>

<body>
    <div class="container mx-auto max-w-8xl ">
        <header>
            <div class="flex justify-between  border-b-2 rounded-lg  mx-10">
                <div class="logo">
                    <img class="w-[100px] h-[100px] rounded-full" src="../public/image/logo-bee-blog.png" alt="">
                </div>
                <nav class=" my-auto text-xl">
                    <ul class="flex space-x-10 ">
                        <li class="hover:text-yellow-300 "><a href="../site/header.php"><strong>Home </strong></a></li>
                        <li><a class="hover:text-yellow-300" href="#"><strong>Post </strong></a></li>
                        <li><a class="hover:text-yellow-300" href="#"><strong>Food </strong></a></li>
                        <li><a class="hover:text-yellow-300" href=".././admin/hdusser.php"><strong>Cài Đặt</strong></a></li>
                    </ul>
                </nav>
                <div class="user my-auto">
                    <?php //bắt đầu session
                    if (isset($_SESSION["email"])) {
                        echo "<div class='user-sign'>";
                        // echo "<a class ='button' href=";
                        echo "<div class='avatar'><a href='../admin/thongtin.php'><img class='rounded-full h-[50px] w-[50px]' src='../public/image/";
                        echo $_SESSION["avatar"];
                        echo "'></a></div>";
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
            </div>

            <div class="chung">
                <div class="menu">
                    <!-- <div class="menu_logo">
                    <a href="../site/header.php"><img class=" rounded-full" src="../public/image/bee-removebg-preview.png" alt="" width="180px"></a>
                    <a href=""><button>Đăng xuất</button></a>
                    </div> -->
                    <nav class="menu_chinh">
                        <ul class="">
                            <div class="a1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                </svg>
                                <li class="a2"> <a href="hdusser.php">Cài đặt chung </a></li>
                            </div>
                            <div class="a1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z" />
                                </svg>
                                <li class="a2"><a href="doimk.php">Mật khẩu</a></li>
                            </div>
                            <div class="a1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                <li class="a2"><a href="thongtin.php">Thông tin cá nhân</a></li>
                            </div>
                        </ul>
                    </nav>
                </div>

                <div>
                    <div class="mat_khau">
                        <h1>Mật khẩu</h1>
                        <small>thay đổi mật khẩu của bạn</small>
                        <form action="" method="POST" class="pt-10 space-y-5">
                            <input type="password" class="border border-black" placeholder=' old password' name='password'><br>
                            <label for="">mật khẩu cũ</label><br>

                            <input type="password" class="border border-black" placeholder=' new password' name='newpassword'><br>
                            <label for="">mật khẩu mới</label><br>

                            <input type="password" class="border border-black" placeholder=' re-enter new password' name='newpassword_1'><br>
                            <label for="">nhập lại mật khẩu</label><br>

                            <a href=""> <button class="bg-blue-200 mt-10 border rounded-xl px-5 text-blue-500" type="submit" name="btn" style="margin-bottom: 10px;"><strong> Thay đổi</button></a>
                            <?php
                            if ($loi != "") { ?>
                                <div class="text-black"><?php echo $loi ?></div>
                            <?php  } ?>
                        </form>
                    </div>
                </div>

                <div class="img">
                    <a href="doimk.php"><img class="h-[230px]" src="../public/image/pw.jpg" alt=""></a><br>
                    <a href="doimk.php"><img class="h-[230px]" src="https://chungnhanquocte.com/wp-content/uploads/2017/10/m%E1%BA%ADt-kh%E1%BA%A9u.jpg" alt=""></a>

                </div>
            </div>
            <section>
                <footer>

                </footer>
            </section>
    </div>
</body>

</html>