<?php
// include "./model/config.php";
include './header.php';
$query = "select * from post";
$post = getAll($query);
$query1 = "select userID from post";
$item = getAll($query1);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../public/css/index.css">

</head>
<style>
.search_bar {
    margin-top: 10px;
    margin-left: 700px;
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

.post {
    margin-top: 100px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    margin-left: 200px;
}

.thumbnail img {
    width: 530px;
    height: 290px;
    border-radius: 10px;
    margin-top: 15px;
}

.post-info h2:hover {
    color: #fbff00;
}

.post-info h3:hover {
    color: #a1a334;
}

.desc {
    margin-left: 10px;
    width: 300px;
}

.category-list {
    margin-left: 500px;
    padding: 60px 60px;
}

.category-list button {
    width: 100px;
    height: 50px;
    margin-left: 50px;
    background-color: #e6eba2;
    border-radius: 50px 50px 50px 50px;
}
</style>

<body>
    <div class="container">
        <?php

        ?>
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
                        <img src="../public/image/<?php echo $value["thumbnail"]; ?>" alt="">
                    </div>
                    <div class="desc">
                        <h2><?php echo $value["title"] ?></h2>
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
    </div>
</body>

</html>