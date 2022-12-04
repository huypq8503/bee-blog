<?php
session_start();
require_once './model/config.php';
// echo"<pre>";
// var_dump($_POST);
// die();
$id = $_POST['id'];
$userName = $_POST["userName"];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST["lastName"];
// $avatar = $_POST["avatar"];
$query = "UPDATE users SET lastName='$lastName', email='$email', firstName='$firstName', userName='$userName' WHERE id=$id";

// $query = "UPDATE users SET categoryName = '$categoryName' where id=$id ";
connect($query);

// Không cần nhận kq khi chỉnh sửa, cần quay về ds để xem ds mới
header('location: thongtin.php');
