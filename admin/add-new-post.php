<?php
require_once './model/config.php';
session_start();
$query = "select * from category";
$category = getAll($query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    h1 {
        text-align: center;
        margin-top: 30px;
    }

    form {
        width: 944px;
        margin: 0 auto;
    }

    select:required:invalid {
        color: gray;
        opacity: 0.2;

    }

    option[value=""][disabled] {
        display: none;
    }

    label {
        font-size: 16px;
    }

    input {
        height: 36px;
        width: 944px;
        border-radius: 4px;
        margin-bottom: 32px;
        margin-top: 8px;
        padding-left: 16px;
    }

    #file {
        padding: 0;
    }

    textarea {
        height: 167px;
        width: 944px;
        padding-left: 16px;
        padding-top: 8px;
        margin-bottom: 32px;
        margin-top: 32px;
    }

    select {
        margin-top: 8px;
        width: 944px;
        height: 36px;
    }

    button {
        height: 39px;
        width: 132px;
        text-align: center;
        border-radius: 5px;
        background: #38A169;
        color: white;
        margin: 32px auto;
        border: none;
    }
    </style>
</head>

<body>
    <?php
    require './sidebar.php';
    ?>
    <section class="home">
        <h1>Add New Post</h1>
        <form action="./controller/save-add-post.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title"> <br>
            <input type="text" name="sub-title" placeholder="Sub Title"> <br>
            <select name="post-category" id="">
                <?php foreach ($category as $value) : ?>
                <option value="<?php echo $value["id"] ?>"><?php echo $value["categoryName"] ?></option>
                <?php endforeach ?>
            </select> <br>
            <textarea name="content" id="" cols="30" rows="10" placeholder="Body"></textarea><br>
            <label for="">Add thumbnail</label><br>
            <input type="file" name="thumbnail" id=""><br>
            <button type="submit">Add Post</button>
        </form>
    </section>
</body>

</html>