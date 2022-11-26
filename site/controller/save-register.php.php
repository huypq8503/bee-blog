<?php
require '../model/config.php';

$firstname = $_POST["first-name"];
$lastname = $_POST["last-name"];
$username = $_POST["user-name"];
$email = $_POST["email"];
$password = $_POST["password"];
$avatar = $_FILES["avatar"]["name"];
$query = "insert into users(email,firstName,lastName,userName,password,avatar) values('$email','$firstname','$lastname','$username',$password,'$avatar')";
connect($query);
move_uploaded_file($_FILES["avatar"]["tmp_name"], "../image/" . $_FILES["avatar"]["name"]);

header("location:../index.php");