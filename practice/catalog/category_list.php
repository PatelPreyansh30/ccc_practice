<?php
include 'sql/functions.php';
$category = select('ccc_category', 'cat_id', ['*']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <style>
        h1 {
            margin: 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <pre>
    <h1>Category Records</h1>
    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Delete</th>
            <th>Update</th>
        </thead>
        <tbody>
            <?php
            if ($category->num_rows > 0) {
                while ($row = $category->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['cat_id']}</td>
                        <td>{$row['name']}</td>
                        <td><a href='product.php'>Delete</a></td>
                        <td><a href='product.php'>Update</a></td>
                    </tr>
                    ";
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>