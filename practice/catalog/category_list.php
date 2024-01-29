<?php
include 'sql/functions.php';
$query = selectQuery('ccc_category', ['*']);
$category = queryExecutor($query);
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

        .link {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
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
                        <td>{$row['cat_name']}</td>
                        <td><a href='category.php?action=delete&cat_id={$row['cat_id']}'>Delete</a></td>
                        <td><a href='category.php?action=update&cat_id={$row['cat_id']}'>Update</a></td>
                    </tr>
                    ";
                }
            }
            ?>
        </tbody>
    </table>
    <a href="category.php" class="link">Add Category</a>
    <a href="product.php" class="link">Add Product</a>
    <a href="product_list.php" class="link">View Product</a>
</body>

</html>