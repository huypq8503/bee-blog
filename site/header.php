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


        .search_bar {
            margin-top: 10px;
            margin-left: 500px;
        }

        .search_bar-container {
            position: relative;
            width: 30rem;
            background-color: #e6eba2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            overflow: hidden;
            padding: 0.6rem 1rem;
            border-radius: 5px;
            color: #ce7cf5;
        }

        .search_bar-container>div {
            width: 100%;
            display: flex;
            align-items: center;
        }

        .search_bar input {
            background-color: transparent;
            border: none;
            margin-left: 0.7rem;
            padding: 0.5rem 0;
            width: 100%;
        }

        .search_bar button {
            display: inline-block;
            width: fit-content;
            background-color: #e5f516;
            padding: 0.6rem 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: var(--transition);
            color: var(--color-white);
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
                    <li><a href="header.php">BLOG</a></li>
                    <li><a href="#">PODCAST</a></li>
                    <li><a href=".././admin/thongtin.php">ABOUT</a></li>
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
                    echo "<div class='avatar'><a href='../admin/hdusser.php'><img src='../public/image/";
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
        </header>
        <!-- <<<<<<< HEAD======= -->
        <main>
            <section class="search_bar">

                <form class="container search_bar-container" action="">
                    <div>
                        <i class='bx bx-search-alt-2'></i>
                        <input type="search" name="" id="" placeholder="Search">
                    </div>
                    <button type="submit">Go</button>
                </form>
            </section>

            <div class="post">
                <?php foreach ($post as $value) : ?>
                    <a href="./post-details.php?id=<?php echo $value["id"] ?>">
                        <div class="post-info">
                            <div class="thumbnail">
                                <img src="../public/image/<?php echo $value["thumbnail"]; ?>" alt="" width="100px" height="100%">
                            </div>
                            <div class="desc">
                                <h3><?php echo $value["title"] ?></h2>
                                    <h4><?php echo $value["sub_title"] ?></h4>
                            </div>

                        </div>
                    </a>
                <?php endforeach ?>
            </div>
            <div class="category-list">
                <?php foreach ($categoryList as $value) : ?>
                    <button><?php echo $value["categoryName"] ?></button>
                <?php endforeach ?>
            </div>
        </main>
        <!-- >>>>>>> c64b2188260e1552372373a2a67d2074243e2242 -->
    </div>
</body>

</html>