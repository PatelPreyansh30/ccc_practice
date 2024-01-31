<?php
include 'sql/builder_and_executor.php';

$ccc_category_object = new QueryBuilder("ccc_category");
$query_executor_object = new QueryExecutor();
$category_query = $ccc_category_object->selectQuery(['*']);
$category_list = $query_executor_object->selectQueryExecutor($category_query);
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
        <?php
        $table_heading = ['Id', 'Name', 'Delete', 'Update'];
        echo "<thead>";
        foreach ($table_heading as $key => $val) {
            echo "<th>{$val}</th>";
        }
        echo "</thead><tbody>";

        if ($category_list != null) {
            for ($i = 0; $i < count($category_list); $i++) {
                echo "
                <tr>
                    <td>{$category_list[$i]['cat_id']}</td>
                    <td>{$category_list[$i]['cat_name']}</td>
                    <td><a href='category.php?action=delete&cat_id={$category_list[$i]['cat_id']}'>Delete</a></td>
                    <td><a href='category.php?action=update&cat_id={$category_list[$i]['cat_id']}'>Update</a></td>
                    </tr>
                    ";
            }
        }
        echo "</tbody>";
        ?>
    </table>
    <a href="category.php" class="link">Add Category</a>
    <a href="product.php" class="link">Add Product</a>
    <a href="product_list.php" class="link">View Product</a>
</body>

</html>