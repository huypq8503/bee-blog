<?php
include "../model/config.php";
$id = $_POST["idCategory"];
$categoryName = $_POST["cateName"];

$Err = "";
$cate = "";
if (isset($_POST["submit"])) {
    if (empty($_POST["cateName"])) {
        $Err = "CateName is required";
    } else {
        $cate = $_POST["cateName"];
        $query1 = "SELECT * FROM category where categoryname like n'$cate'";
        $category = getAll($query1);
        if (count($category) != 0) {
            $Err = "Category name already exists";
        }
    }
}
$query = "UPDATE category SET categoryName = '$categoryName' where id=$id ";
connect($query);
header("location:../category-manager.php");