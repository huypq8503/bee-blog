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
    <title>Blog : Homepage</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../public/css/header.css">

</head>

<body>

    <nav class="navbar">
        <img src="../public/image/logo.png" class="logo" alt="">
        <ul class="links-container">
            <li class="link-item"><a href="./index.php" class="link">Blog</a></li>
            <li class="link-item"><a href="./add-new-post.php" class="link">editor</a></li>
            <li class="link-item"><a href="./podcast.php" class="link">podcast</a></li>
        </ul>
        <div class="user" onclick="toggleMenu()">
            <img style="border-radius: 50%;width: 50px;height: 50px ;"
                src="../public/image/<?php echo $_SESSION["avatar"] ?>" alt="">
        </div>
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <a href="./my-personal-page.php?id=<?php echo $_SESSION["id"] ?>">
                    <div class="user-info">
                        <img style="border-radius: 50%;width: 50px;height: 50px ;"
                            src="../public/image/<?php echo $_SESSION["avatar"] ?>" alt="">
                        <h3 style="text-decoration: none;"><?php echo $_SESSION["userName"] ?></h3>
                    </div>
                </a>
                <hr>
                <a href="#" class="sub-menu-link">
                    <i class='bx bxs-user'></i>
                    <p>Edit Profile</p>
                    <span>></span>
                </a>
                <a href="./controller/logout.php" class="sub-menu-link">
                    <i class='bx bx-log-out'></i>
                    <p>Logout</p>
                    <span>></span>
                </a>
            </div>
        </div>

    </nav>
    </div>

</body>
<script>
let subMenu = document.getElementById("subMenu");

function toggleMenu() {
    subMenu.classList.toggle("open-menu");
}
</script>

</html>