<?php
include './navbar.php';
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
    <link rel="stylesheet" href="../public/css/header.css">
    <style>
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
        <header class="header">
            <div class="content">
                <h1 class="heading">
                    <span class="small">welcome in the world of</span>
                    <span class="no-fill">Bee Blog</span>
                </h1>
                <a href="./add-new-post.php" class="btn">write a blog</a>
            </div>
        </header>

        <!-- blog section -->
        <section class="blogs-section">
            <?php foreach ($post as $value) : ?>
            <div class="blog-card">
                <img src="../public/image/<?php echo $value["thumbnail"] ?>" class="blog-image" alt="">
                <h1 class="blog-title"><?php echo $value["title"] ?></h1>
                <p class="blog-overview"><?php echo $value["sub_title"] ?></p>
                <a href="./post-detail.php?id=<?php echo $value["id"] ?>" class="btn dark">read</a>
                <a style="border: 1px solid black;" href="./category.php?id=<?php echo $value["categoryID"] ?>"
                    class="btn"><?php echo $value["categoryName"] ?></a>
            </div>
            <?php endforeach ?>
        </section>
    </div>
</body>

</html>