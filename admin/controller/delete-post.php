<?php
include "../model/config.php";
$id = $_GET["id"];
$query = "DELETE FROM post WHERE id=$id";
connect($query);
header("location:../post-manager.php");