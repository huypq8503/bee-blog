<?php
include "../model/config.php";
$id = $_GET["id"];
$query = "DELETE FROM category WHERE id=$id";
connect($query);
header("location:../category-manager.php");