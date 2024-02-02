<?php

include("Lib/autoload.php");

$request = new Model_Request();

if ($request->getQueryData("product_list") == "true") {
    $product_model = new Model_Product();
    $product_list_view = new View_Product_List();

    // print_r($product_model->fetch(['*']));
    echo $product_list_view->toHTML($product_model->fetch(['*']));
} elseif (!$request->isPost()) {
    $product_view = new View_Product();
    echo $product_view->toHTML();
} else {
    $product_model = new Model_Product();
    echo "<pre>";
    print_r($request->getPostData());
    // print_r($product_model->fetch(['*']));
    $product_model->save($request->getPostData('ccc_poduct'));
}