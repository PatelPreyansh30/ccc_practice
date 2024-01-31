<?php
include 'sql/builder_and_executor.php';

$ccc_category_object = new QueryBuilder("ccc_category");
$query_executor_object = new QueryExecutor();
$category_query = $ccc_category_object->selectQuery(['*']);
$category_list = $query_executor_object->selectQueryExecutor($category_query);
$category_list = $query_executor_object->fetchValues($category_list, ['cat_id', 'cat_name']);

$ccc_product_object = new QueryBuilder("ccc_product");
$query_executor_object = new QueryExecutor();
$product_query = $ccc_product_object->selectQuery(['*'], ['LIMIT ' => 20]);
$product_list = $query_executor_object->selectQueryExecutor($product_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product List</title>
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
    <h1>Product Records</h1>
    <table>
        <?php
        $table_heading = ['Id', 'Name', 'SKU', 'Category', 'Price', 'Delete', 'Update'];
        echo "<thead>";
        foreach ($table_heading as $key => $val) {
            echo "<th>{$val}</th>";
        }
        echo "</thead><tbody>";

        if ($product_list != null) {
            for ($i = 0; $i < count($product_list); $i++) {
                echo "
                <tr>
                    <td>{$product_list[$i]['product_id']}</td>
                    <td>{$product_list[$i]['product_name']}</td>
                    <td>{$product_list[$i]['product_sku']}</td>
                    <td>{$category_list[$product_list[$i]['cat_id']]}</td>
                    <td>{$product_list[$i]['product_price']}</td>
                    <td><a href='product.php?action=delete&product_id={$product_list[$i]['product_id']}'>Delete</a></td>
                    <td><a href='product.php?action=update&product_id={$product_list[$i]['product_id']}'>Update</a></td>
                    </tr>
                    ";
            }
        }
        echo "</tbody>";
        ?>
    </table>
    <a href="product.php" class="link">Add Product</a>
    <a href="category.php" class="link">Add Category</a>
    <a href="category_list.php" class="link">View Category</a>
</body>

</html>