<?php
// echo "<pre>";
// var_dump($_POST);
// die;
include "../model/config.php";
session_start();
$idItem = $_GET["id"];
$timeComment = date("Y/m/d");
$idP = $_SESSION["id"];
$title = $_POST["cmt"];
$query = "insert into comment(content, postID, podcastID ,date,userID) values ('$title', $idItem,1, '$timeComment','$idP')";
connect($query);
header("location: ../post-detail.php?id=$idItem");