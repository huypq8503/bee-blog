<?php
include './navbar.php';
$id = $_GET["id"];
$query = "select * from post where id=$id";
$item = getOne($query);
$query1 = "select * from post limit 4";
$post = getAll($query1);
$query2 = "select comment.id AS 'commentID', postID, content, userID, date, users.userName, users.avatar 
    from comment join users on comment.userID = users.id where postID = $id";
$comments = getAll($query2);
$userID = $item["userID"];
$query3 = "SELECT users.avatar, users.userName FROM post JOIN users ON users.id = post.userID WHERE userID = $userID";
$author = getOne($query3);
$query4 = "SELECT post.id AS'postID' ,post.title, comment.content ,
     COUNT(comment.content) AS 'So_luong' from comment join post On comment.postID = post.id 
     GROUP BY post.id, post.title HAVING post.id = $id";
$so_cmt = getAll($query4);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/post-detail.php">
    <link rel="stylesheet" href="../public/css/editor.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
    .show-comment {
        width: 100%;
        height: 170px;
        border: 1px solid blue;
        border-radius: 10px;
        margin-top: 50px;
    }

    .user-comment {
        width: 100%;
        height: 70px;
        border-radius: 10px 10px 0px 0px;
        background: rgba(230, 234, 241, 1);
        padding: 10px;
        border: 1px solid blue;
        font-size: 18px;
    }

    .banner {
        width: 100%;
        height: 1500px;
    }

    .banner img {
        width: 100%;
        height: 1500px;
    }

    .blog {
        height: 2000px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="banner">
            <img src="../public/image/<?php echo $item["thumbnail"] ?>" alt="">
        </div>
        <div class="blog">
            <h1 class="title"><?php echo $item["title"] ?></h1>
            <div class="author">
                <a style="text-decoration: none;" href="./personal-page.php?id=<?php echo $userID ?>">
                    <div class="avatar">
                        <img style="border-radius: 50%;width: 50px;height: 50px ;"
                            src="../public/image/<?php echo $author["avatar"] ?>" alt="">
                    </div>
                    <div class="userName">
                        <p style="text-decoration: none;"><?php echo $author["userName"] ?></p>
                    </div>
                </a>
            </div>
            <div class="article">
                <p><?php echo $item["content"] ?></p>

            </div>
            <div class="comment">
                <?php foreach ($so_cmt as $value) : ?>
                <h2 style="margin-bottom: 30px;">Comment (<?php echo $value["So_luong"] ?>)</h2>
                <?php endforeach ?>
                <div class="writing-comment">
                    <form action="./controller/save-comment.php?id=<?php echo $id ?>" method="POST">
                        <textarea name="cmt" id="" cols="180" rows="10" placeholder="Enter Comment"></textarea>
                        <button id="submit" type="submit" style="font-size:20px; padding:8px">Post Comment</button>
                    </form>
                </div>
                <?php foreach ($comments as $value) : ?>
                <div class="show-comment">
                    <div class="user-comment">
                        <p>By <b><?php echo $value["userName"] ?></b></p>
                        <span><?php echo $value["date"] ?></span>
                    </div>
                    <div class="content-comment">
                        <p style="padding-left: 10px;"><?php echo $value["content"] ?></p>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    </div>
</body>

</html>