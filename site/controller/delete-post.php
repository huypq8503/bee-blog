<?php
require "../model/config.php";
$id = $_GET["id"];
// var_dump($_GET);
// die();
$query = "DELETE FROM post WHERE id=$id";
connect($query);
header("location:../index.php");