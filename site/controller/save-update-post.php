<?php
session_start();
require "../model/config.php";
// echo "<pre>";
// var_dump($_POST);
// echo "<pre>";
// var_dump($_FILES);
// die();
$id = $_POST["postId"];
$content = $_POST['editor_input'];
$thumbnail = $_FILES["thumbnail"]["name"];
$title = $_POST["title"];
$subtitle = $_POST["sub-title"];
$postcategory = $_POST["post-category"];
$userID = $_SESSION["id"];
if ($thumbnail == "") {
    $query = "UPDATE post SET content = '$content', title = '$title', sub_title = '$subtitle', categoryID = '$postcategory', userID = '$userID'  WHERE id=$id";
} else {
    $$query = "UPDATE post SET content = '$content', thumbnail = '$thumbnail' , title = '$title', sub_title = '$subtitle', categoryID = '$postcategory', userID = '$userID'  WHERE id=$id";;
}
connect($query);
move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "../image/" . $_FILES["thumbnail"]["name"]);
header("location:../index.php");