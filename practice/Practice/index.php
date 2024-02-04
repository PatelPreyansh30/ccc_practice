<?php

include("Lib/autoload.php");

$request = new Model_Request();
$abstract = new Model_Abstract();

if ($request->getQueryData("list") == "product") {
    $product_model = new Model_Product();

    $query = $abstract->getQueryBuilder()->select('ccc_category', ['*']);
    $categories = $abstract->getQueryBuilder()->execute($query);
    $categories = $abstract->getQueryExecutor()->fetchValues($categories, ['cat_id', 'cat_name']);

    $product_list_view = new View_Product_List();
    echo $product_list_view->toHTML($product_model->fetch(['*']), $categories);
} elseif ($request->getQueryData('form') == 'product') {
    $query = $abstract->getQueryBuilder()->select('ccc_category', ['*']);
    $categories = $abstract->getQueryBuilder()->execute($query);
    $categories = $abstract->getQueryExecutor()->fetchValues($categories, ['cat_id', 'cat_name']);

    $product_view = new View_Product();
    echo $product_view->toHTML($categories);
} elseif ($request->getQueryData('action') == 'delete' && $request->getQueryData('product_id')) {
    $product_model = new Model_Product();
    $action = $request->getQueryData("action");
    $product_id = $request->getQueryData("product_id");
    $status = $product_model->delete(['product_id' => $product_id]);
    if ($status) {
        echo "<script>alert('Data deleted successfully')</script>";
        echo "<script>location. href='?list=product'</script>";
    }
} elseif ($request->isPost()) {
    $product_model = new Model_Product();
    $data = $request->getPostData('ccc_product');
    $result = $product_model->save($data);
    if ($result) {
        echo "<script>alert('Data added successfully')</script>";
        echo "<script>location. href='?form=product'</script>";
    }
} else {
    echo "<a href='?form=product' class='link'>Add Product</a>";
    echo "<a href='?list=product' class='link'>View Product</a>";
}