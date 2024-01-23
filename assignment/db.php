<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "ccc_practice";

$connection = mysqli_connect($server, $user, $password, $database);

$product_name = $_POST['product_name'];
$product_sku = $_POST['product_sku'];
$product_type = $_POST['product_type'];
$product_category = $_POST['product_category'];
$manufacturer_cost = $_POST['manufacturer_cost'];
$shipping_cost = $_POST['shipping_cost'];
$total_cost = $_POST['total_cost'];
$product_price = $_POST['product_price'];
$product_status = $_POST['product_status'];
$product_created_at = $_POST['product_created_at'];
$product_updated_at = $_POST['product_updated_at'];

if (mysqli_connect_errno()) {
    echo "Connection error";
} else {
    $query = "INSERT INTO ccc_product VALUES('','$product_name','$product_sku','$product_type','$product_category','$manufacturer_cost','$shipping_cost','$total_cost','$product_price','$product_status','$product_created_at','$product_updated_at');";

    $insert_product = mysqli_query($connection, $query);

    if ($insert_product) {
        echo "
        '$product_name'<br>
'$product_sku'<br>
'$product_type'<br>
'$product_category'<br>
'$manufacturer_cost'<br>
'$shipping_cost'<br>
'$total_cost'<br>
'$product_price'<br>
'$product_status'<br>
'$product_created_at'<br>
'$product_updated_at'
        ";
    } else {
        echo "Something wrong while insertion";
    };
};
