<?php
include "../model/config.php";
$id = $_POST["postID"];
$content = $_POST["content"];
$thumbnail = $_FILES["thumbnail"]["name"];
$title = $_POST["title"];
$subtitle = $_POST["sub-title"];
$postcategory = $_POST["post-category"];

$query = "UPDATE post SET title = '$title',content ='$content',sub_title ='$subtitle',categoryID = '$postcategory', thumbnail = '$thumbnail' where id=$id ";
connect($query);
header("location:../post-manager.php");