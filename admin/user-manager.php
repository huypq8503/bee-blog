<?php
require_once './model/config.php';
$query = "select * from users";
$users = getAll($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/category-table.css">
    <style>
    table {
        border: 1px solid purple;
        border-collapse: collapse;
        width: 80%;
        height: 600px;
        margin-top: 60px;
        text-align: center;
        margin-left: 200px;
    }

    td {
        height: 10px;
    }

    tbody {
        height: 10px;
    }


    button {
        color: #2e2e2e;
        width: 70px;
        height: 30px;
        background-color: #d2d2d2;
    }

    button:hover {
        color: #d2d2d2;
    }
    </style>
    </style>


</head>

<body>
    <?php
    require './sidebar.php';
    ?>
    <section class="home">
        <table border="1">
            <thead>
                <tr>
                    <th style="width: 10px;">#</th>
                    <th style="width: 30px;">User Name</th>
                    <th style="width: 30px;">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $value) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $value["userName"] ?></td>
                    <td><?php echo $value["email"] ?></td>
                </tr>
            </tbody>
            <?php endforeach ?>
        </table>
    </section>
</body>

</html>