<?php
include "./model/config.php";
session_start();
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
</head>
<body>
    <div class="container mx-auto max-w-8xl ">
        <header >
            <div class="flex justify-between  rounded-lg  mx-10  ">
            <div class="logo">
                <img class="w-[100px] h-[70px] rounded-full" src="../public/image/logo-bee-blog.png" alt="">
            </div>
            <div class="logo2"><img class="w-[150px] h-[90px]" src="../public/image/travel.jpg" alt=""></div>
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
         <nav class=" my-auto text-xl flex justify-center ">
                <ul class="flex space-x-10 ">
                    <li class="hover:text-yellow-300 "><a href="header.php"><strong>Home </strong></a></li>
                    <li><a class="hover:text-yellow-300"  href="#"><strong>Post </strong></a></li>
                    <li><a class="hover:text-yellow-300" href=".././admin/thongtin.php"><strong>travel</strong></a></li>
                    <li><a class="hover:text-yellow-300" href="#"><strong>Food </strong></a></li>
                </ul>
            </nav>
         <div class="banner flex justify-center h-[500px] w-[1550px] mt-5  rounded-lg"><img class="h-[300px  w-[2000px]" src="../public/image/banner3.jpg" alt=""></div>
        </header>
        <main class="">
         
            <section class="search_bar">

<form class="container search_bar-container flex justify-center " action="">
    <div class="flex border border-2 rounded-xl border-yellow-400  mt-2">
        <i class='bx bx-search-alt-2'></i>
        <input class="rounded-xl" type="search" name="" id="" placeholder="Search">
    <button class="bg-yellow-300 rounded-lg px-5" type="submit">Go</button>
    </div>
</form>
</section>
            <div class="post grid grid-cols-2 gap-4 mx-10 mt-10">
                <?php foreach ($post as $value) : ?>
                <a href="./post-details.php?id=<?php echo $value["id"] ?>">
                    <div class="post-info flex my-5 grid grid-cols-3 gap-8 border border-4 ">
                        <div class="thumbnail">
<img class="w-full h-[200px]" src="../public/image/<?php echo $value["thumbnail"]; ?>" alt="">
                        </div>
                        <div class="desc col-span-2">
                            <h3><?php echo $value["title"] ?></h2>
                                <h4><?php echo $value["sub_title"] ?></h4>
                        </div>

                    </div>
                </a>
                <?php endforeach ?>
            </div>
            <div class="category-list flex justify-center">
                <?php foreach ($categoryList as $value) : ?>
                <button class="mx-5 border border-2 rounded-lg bg-yellow-300 px-5 mx-5"><?php echo $value["categoryName"] ?></button>
                <?php endforeach ?>
            </div>
        </main>
        <footer class="bg-gray-800 py-10 mx-2 my-5 text-white grid grid-cols-2 rounded-lg">
            <div class="ml-20">
        <h2>Thông tin  </h2>
           <span> Môn học:  Dự án 1 </span> <br>
           <span>Giáo viêm:  Vũ Anh Tú </span> <br>
           <span> Các thành viên: <br> Nguyễn Sỹ Đạt , Phạm Quang Huy , Ngyễn Văn Quang, Nguyễn Văn Hoàng , Dương Khắc Tiến <br></span>
           </div>
           <div class="text-end mr-20">
           <span > <a href="" class="mr-20">Liên hệ</a> <br> email: nhom8@fpt.edu.vn <br> Số điện thoại: 03646499xx</span>
           </div>
        </footer>
    </div>
</body>

</html>