<?php
function connect($query)
{
    $connection = new PDO("mysql:host=localhost;dbname=bee-blog;charset=utf8", "root", "");
    $stmt = $connection->prepare($query);
    $stmt->execute();
    return $stmt;
}
function getAll($query)
{
    $result = connect($query)->fetchAll();
    return $result;
}
function getOne($query)
{
    $result = connect($query)->fetch();
    return $result;
}
?>

<?php
// $host = "localhost";
// $user = "root";
// $pass = "";
// $db = "web";
// $conn = null;
// try {
//     $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }
// function getData($sql)
// {
//     global $conn;
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $result = $stmt->fetchAll();
//     return $result;
// }
// function action($sql)
// {
//     global $conn;
//     $conn->exec($sql);
// }
// function total($sql)
// {
//     global $conn;
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $result = $stmt->fetchColumn();
//     return $result;
// }
?>