<?php
session_start();
require "../model/config.php";
// echo "<pre>";
// var_dump($_POST);
// echo "<pre>";
// var_dump($_FILES);
// die();
$content = $_POST["content"];
$thumbnail = $_FILES["thumbnail"]["name"];
$title = $_POST["title"];
$subtitle = $_POST["sub-title"];
$postcategory = $_POST["post-category"];
$userID = $_SESSION["id"];
$query = "INSERT INTO post(content,thumbnail,title,sub_title,categoryID,userID) values ('$content','$thumbnail','$title','$subtitle','$postcategory','$userID')";
connect($query);
move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "../image/" . $_FILES["thumbnail"]["name"]);
header("location:../post-manager.php");