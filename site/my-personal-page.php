<?php
include './navbar.php';
$id = $_GET["id"];
$query3 = "SELECT users.avatar, users.userName FROM post JOIN users ON users.id = post.userID WHERE userID = $id";
$author = getOne($query3);
$query = "SELECT category.categoryName, post.id, post.content, post.thumbnail, post.title, post.sub_title, post.categoryID, post.userID FROM post JOIN category on post.categoryID = category.id";
$post = getAll($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .author {
        margin-top: 100px;
        margin-left: 100px;
    }

    .blogs-section .btn {
        padding: 10px 20px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.7);
        color: #000;
        text-decoration: none;
        text-transform: capitalize;
    }

    .blogs-section .btn:hover {
        color: rgb(255, 251, 0);
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="author">
            <a style="text-decoration: none;" href="./personal-page.php?id=<?php echo $userID ?>">
                <div class="avatar">
                    <img style="border-radius: 50%;width: 150px;height: 150px ;"
                        src="../public/image/<?php echo $author["avatar"] ?>" alt="">
                </div>
                <div class="userName">
                    <p style="text-decoration: none;"><?php echo $author["userName"] ?></p>
                </div>
            </a>
        </div>
        <!-- blog section -->
        <section class="blogs-section">
            <?php foreach ($post as $value) : ?>
            <div class="blog-card">
                <img src="../public/image/<?php echo $value["thumbnail"] ?>" class="blog-image" alt="">
                <h1 class="blog-title"><?php echo $value["title"] ?></h1>
                <p class="blog-overview"><?php echo $value["sub_title"] ?></p>
                <a href="./post-detail.php?id=<?php echo $value["id"] ?>" class="btn dark">read</a>
                <a style="border: 1px solid black;" href="./category.php?id=<?php echo $value["categoryID"] ?>"
                    class="btn light"><?php echo $value["categoryName"] ?></a>
                <a href="./update-post.php?id=<?php echo $value["id"] ?>" class="btn abstract">Update</a>
            </div>
            <?php endforeach ?>
        </section>
    </div>
</body>

</html>