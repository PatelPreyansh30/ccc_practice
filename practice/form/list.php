<?php
include 'mysql_function.php';

$results = select('ccc_product', [], 10);
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
    <h1>Product Records</h1>
    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Type</th>
            <th>Category</th>
            <th>Manufacturer Cost</th>
            <th>Shipping Cost</th>
            <th>Total Cost</th>
            <th>Price</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php
            if ($results->num_rows > 0) {
                while ($row = $results->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['index']}</td>
                        <td>{$row['product_name']}</td>
                        <td>{$row['product_sku']}</td>
                        <td>{$row['product_type']}</td>
                        <td>{$row['product_category']}</td>
                        <td>{$row['manufacturer_cost']}</td>
                        <td>{$row['shipping_cost']}</td>
                        <td>{$row['total_cost']}</td>
                        <td>{$row['product_price']}</td>
                        <td>{$row['product_status']}</td>
                        <td>{$row['product_created_at']}</td>
                        <td>{$row['product_updated_at']}</td>
                        <td><a href=''>Delete</a> | <a href=''>Update</a></td>
                    </tr>
                    ";
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>