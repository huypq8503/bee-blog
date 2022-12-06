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
    <style>
    .show-comment {
        width: 100%;
        border-radius: 10px;
        background: rgba(230, 234, 241, 1);
        padding: 10px;
        margin-top: 25px;
    }

    .comment-user {
        display: flex;
        justify-content: center;
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
                <class="comment">
                    <div class="number-comment">
                        <?php foreach ($so_cmt as $value) : ?>
                        <h3>Bình luận( <?php echo $value["So_luong"] ?> )</h3>
                        <?php endforeach ?>
                    </div>


                    <?php foreach ($comments as $value) : ?>
                    <div class="show-comment">
                        <div class="comment-user">
                            <div class="comment-img">
                                <img style="border-radius: 50%;width: 50px;height: 50px ;"
                                    src="../public/image/<?php echo $value["avatar"] ?>" alt="">
                            </div>
                            <div class="comment-text">
                                <p style="font-size: 24px;"><?php echo $value["userName"] ?></p>
                                <p style="font-size: 18px; "><?php echo $value["date"] ?></p>
                            </div>
                        </div>

                        <span><?php echo $value["content"] ?></span>
                    </div>
                    <?php endforeach ?>
                    <div class="writing-comment">
                        <form action="./controller/save-comment.php?id=<?php echo $id ?>" method="POST">
                            <label for="" style="font-size:20px ; font-weight: 600;">Viết bình luận của bạn</label> <br>
                            <textarea
                                style="padding: 20px; border: 2px dashed black; border-radius: 10px; margin-top: 10px; font-size: 20px;"
                                name="cmt" id="" cols="70" rows="8"></textarea>
                            <button id="submit" type="submit" style="font-size:20px; padding:8px">Gửi</button>
                        </form>

                    </div>
            </div>
        </div>
    </div>
    </div>

    </div>
</body>

</html>