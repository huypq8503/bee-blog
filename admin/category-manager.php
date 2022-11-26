<?php
require_once './model/config.php';
$query = "select * from category";
$category = getAll($query);
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
                    <th style="width: 30px;">Category Name</th>
                    <th style="width: 30px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category as $key => $value) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $value["categoryName"] ?></td>
                    <td>
                        <a href="./update-category.php?id=<?php echo $value["id"] ?>">
                            <button>Edit</button>
                        </a>
                        <a href="./controller/delete-category.php?id=<?php echo $value["id"] ?>">
                            <button>Delete</button>
                        </a>
                    </td>
                </tr>
            </tbody>
            <?php endforeach ?>
        </table>
    </section>
</body>

</html>