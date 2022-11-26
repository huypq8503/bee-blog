<?php
require_once './model/config.php';
// $query = "select * from category";
// $category = getAll($query);
$Err = "";
$cate = "";
if (isset($_POST["submit"])) {
    if (empty($_POST["cateName"])) {
        $Err = "CateName is required";
    } else {
        $cate = $_POST["cateName"];
        $query = "SELECT * FROM category where categoryname like n'$cate'";
        $category = getAll($query);
        if (count($category) != 0) {
            $Err = "Category name already exists";
        } else {
            $query = "INSERT INTO category(categoryname) values('$cate')";
            connect($query);
            header("location:./category-manager.php");
        }
    }
}
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
        <form action="./add-new-category.php" method="post" style="text-align: center; margin-top: 200px;">
            <h1 for="" style="font-size: 40px;">Category Name</h1><br>
            <input type="text" value="" name="cateName"
                style=" margin-top:10px;width: 300px; padding: 10px 10px;border-radius:10px 0 10px 0; border: 2px dashed black;  font-size: 20px;">
            <br>
            <span id="err" style="color: red;"><?php echo $Err ?></span> <br>
            <button type="submit" name="submit"
                style="font-size: 20px; padding: 10px; border: none; border-radius: 10px 0 10px 0; background-color: #7380ec ; color:white; margin-top: 10px;">Add</button>

        </form>
    </section>
</body>

</html>