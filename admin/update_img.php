<?php
session_start();
require_once './model/config.php';
$loi = "";
$id = $_POST['id'];
$avatar = $_FILES['avatar']['name'];
if ($avatar == "") {
    echo "return thong_bao()";
} else {
    $query = "UPDATE users SET avatar = '$avatar' where id = $id";

    $connection = new PDO("mysql:host=localhost;dbname=bee-blog;charset=utf8", "root", "");
    $stmt = $connection->prepare($query);
    $stmt->execute();

    move_uploaded_file($_FILES["avatar"]["tmp_name"], "../public/image/" . $_FILES["avatar"]["name"]);
    header('location: hdusser.php');
}
