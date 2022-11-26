<?php
require_once './model/config.php';
$query = "select * from post";
$post = getAll($query);

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

<body>
    <div class="container">
        <?php
        include './header.php';
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

        <div class="product">
            <?php foreach ($post as $value) : ?>
            <a href="./post-details.php?id=<?php echo $value["id"] ?>">
                <div class="post-info">
                    <div class="thumbnail">
                        <img src="../public/image/<?php echo $value["thumbnail"]; ?>" alt="">
                    </div>
                    <div class="desc">
                        <h3><?php echo $value["title"] ?></h2>
                            <h4>$<?php echo $value["sub_title"] ?></h4>
                    </div>

                </div>
            </a>
            <?php endforeach ?>
        </div>
    </div>
</body>

</html>