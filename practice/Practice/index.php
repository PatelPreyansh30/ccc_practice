<?php

include("Lib/autoload.php");

$request = new Model_Request();

if ($request->getQueryData("product_list") == "true") {
    $product_model = new Model_Product();
    $product_list_view = new View_Product_List();
    echo $product_list_view->toHTML($product_model->fetch(['*']));
} elseif (!$request->isPost()) {
    $product_view = new View_Product();
    echo $product_view->toHTML();
} else {
    $product_model = new Model_Product();
    $data = $request->getPostData('ccc_product');
    $result = $product_model->save($data);
    if($result){
        echo "<script>alert('Data added successfully')</script>";
        echo "<script>location. href='index.php'</script>";
        // header("Location: index.php");
    }
}