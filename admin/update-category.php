<?php
require_once './model/config.php';
$id = $_GET["id"];
$query = "SELECT * FROM category where id=$id";
$item = getOne($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require './sidebar.php';
    ?>
    <section class="home">
        <form action="./controller/save-update-category.php" method="post"
            style="text-align: center; margin-top: 200px;">
            <input type="text" name="idCategory" value="<?php echo $item["id"] ?>" hidden>
            <h1 for="" style="font-size: 40px;">Update Category</h1><br>
            <input type="text" value="<?php echo $item["categoryName"] ?>" name="cateName"
                style=" margin-top:10px;width: 300px; padding: 10px 10px;border-radius:10px 0 10px 0; border: 2px dashed black;  font-size: 20px;">
            <br>

            <button type="submit" name="submit"
                style="font-size: 20px; padding: 10px; border: none; border-radius: 10px 0 10px 0; background-color: #7380ec ; color:white; margin-top: 10px;">Update</button>

        </form>
    </section>
</body>

</html>