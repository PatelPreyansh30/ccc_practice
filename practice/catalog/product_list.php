<?php
include 'sql/functions.php';

$query = selectQuery('ccc_category', ['*']);
$category = queryExecutor($query);
$categories = [];
while ($row = $category->fetch_array()) {
    $categories[$row['cat_id']] = $row['cat_name'];
};

$query = selectQuery('ccc_product', ['*'], ['LIMIT ' => 20]);
$products = queryExecutor($query);
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
    <h1>Product Records</h1>
    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Category</th>
            <th>Delete</th>
            <th>Update</th>
        </thead>
        <tbody>
            <?php
            if ($products->num_rows > 0) {
                while ($row = $products->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['product_id']}</td>
                        <td>{$row['product_name']}</td>
                        <td>{$row['product_sku']}</td>
                        <td>{$categories[$row['cat_id']]}</td>
                        <td><a href='product.php?action=delete&product_id={$row['product_id']}'>Delete</a></td>
                        <td><a href='product.php?action=update&product_id={$row['product_id']}'>Update</a></td>
                    </tr>
                    ";
                }
            }
            ?>
        </tbody>
    </table>
    <a href="product.php" class="link">Add Product</a>
</body>

</html>