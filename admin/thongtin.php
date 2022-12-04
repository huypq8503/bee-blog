<?php
session_start();
require_once './model/config.php';
// if (!isset($_SESSION['user'])) {
//     header('location: login.php');
// }else 
// if(isset($_SESSION["gmail"])){
//     $id = $_POST[""] = $_SESSION["user"]["id"];
//     $sql= "SELECT * FROM users WHERE id = $id";
//     $statement = $connect->prepare($sql);
//     $statement->execute();
//     $user=$statement->fetch();
//     $userInfo = $_SESSION['email'];
// // }
$id = $_SESSION['id'];
$query = "select * from users where id=$id";
$users = getOne($query);
// var_dump();
// die();
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
// die();
?>


<?php
require_once './model/config.php';
$loi = "";
if (isset($_POST['btn']) == true) {
    $loi .= "thay đổi mật khẩu thành công";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

    <style>
        @import url(https://fonts.googleapis.com/css?family=Oswald:400);
    </style>

    <style>
        .chung {
            display: grid;
            grid-template-columns: 25% 75%;
        }

        .menu {
            height: 500px;
            margin-left: 20px;
            border-right: 1px solid #C8C8C8;

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
            padding-top: 30px;
            padding-left: 100px;
        }


        .mat_khau h1 {
            font-size: 30px;
        }


        /* .mat_khau small {
            font-size: 20px;
        } */

        .mat_khau form input {
            width: 450px;
            /* height: 30px; */
            padding-left: 10px;
            outline: none;

        }

        .mat_khau form input:hover {
            border-bottom: 1px solid;
            border: none;
            border-radius: 0;

        }

        /* 
        .mat_khau form input:hover {
            outline: none;

        } */

        /*
        .mat_khau form label {
            float: left;
            width: 100%;
        }

        .img {
            text-align: center;
            margin-top: 20%;
            margin-right: 10%;
        } */

        .mat_khau form {
            border-top: 1px solid #9C9C9C;
            border-bottom: 1px solid #9C9C9C;
            width: 90%;
        }

        .tk1 {
            padding: 15px;
        }

        .tk1 h2 {
            float: left;
        }

        .tk1 a button:hover {
            color: #9C9C9C;
            text-decoration-line: underline;
        }

        .mat_khau form .tk1 {
            display: grid;
            grid-template-columns: 25% 60% 15%;
            border-bottom: 2px solid #E8E8E8;
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
                        echo $users["avatar"];
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
                    <nav class="menu_chinh">
                        <ul class="">
                            <div class="aaa">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16" style="float: left; margin:10px 0 0 0;">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                </svg>
                                <h1 style="font-size: 40px; ">Cài đặt</h1>
                            </div>
                            <div class="a1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                <li class="a2"><a href="thongtin.php">Thông tin cá nhân</a></li>
                            </div>
                            <div class="a1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z" />
                                </svg>
                                <li class="a2"><a href="doimk.php">Mật khẩu</a></li>
                            </div>
                            <div class="a1">
                                <i class="fas fa-file-image" style="font-size: 48px; margin-left: 45px;"></i>
                                <li class="a2"> <a href="hdusser.php">Ảnh đại diện </a></li>
                            </div>
                        </ul>
                    </nav>
                </div>
                <div>
                    <div class="mat_khau">
                        <h1>Thông tin cá nhân</h1>
                        <form action="update-user.php" method="POST">
                            <input type="hidden" name="id" value=" <?php echo $users["id"] ?>" hidden>
                            <div class="tk1">
                                <h2 for="">Tên tài khoản</h2>
                                <input type="text" placeholder='username' name='userName' value="<?= $users["userName"] ?>">
                                <a href=""><button type="submit" name="btn" onclick="return thong_bao()">thay đổi</button> </a>
                            </div>

                            <div class="tk1">
                                <h2 for="">FirstName</h2>
                                <input type="text" placeholder='name' name='firstName' value="<?= $users["firstName"] ?>">
                                <a href=""><button type="submit" name="btn" onclick="return thong_bao()">thay đổi</button> </a>
                            </div>


                            <div class="tk1">
                                <h2 for="">LastName</h2>
                                <input type="text" placeholder='name' name='lastName' value="<?= $users["lastName"] ?>">
                                <a href=""><button type="submit" name="btn" onclick="return thong_bao()">thay đổi</button> </a>
                            </div>

                            <div class="tk1">
                                <h2 for="">Email</h2>
                                <input type="text" placeholder='email' name='email' value="<?= $users["email"] ?>">
                                <a href=""><button type="submit" name="btn" onclick="return thong_bao()">thay đổi</button> </a>
                            </div>

                        </form>
                        <h2 id="thong_bao"> </h2>
                    </div>

                </div>
            </div>
</body>
<script>
    function thong_bao() {
        // var hien_thi = document.getElementById("thong_bao");
        // hien_thi.innerHTML = "thay đổi thành công";
        alert("thay đổi thành công");
    }
</script>

</html>