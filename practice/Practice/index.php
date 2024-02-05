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
} elseif ($request->getQueryData('list') == 'category') {
    $category_model = new Model_Category();
    $category_list_view = new View_Category_List();

    echo $category_list_view->toHTML($category_model->fetch(['*']));
} elseif ($request->getQueryData('form') == 'category' && !$request->isPost()) {
    $category_view = new View_Category();
    echo $category_view->toHTML();
} elseif ($request->getQueryData('form') == 'product' && !$request->isPost()) {
    $query = $abstract->getQueryBuilder()->select('ccc_category', ['*']);
    $categories = $abstract->getQueryBuilder()->execute($query);
    $categories = $abstract->getQueryExecutor()->fetchValues($categories, ['cat_id', 'cat_name']);

    $product_view = new View_Product();
    echo $product_view->toHTML($categories);
} elseif ($request->getQueryData('action') == 'delete' && $request->getQueryData('product_id')) {
    $product_model = new Model_Product();

    $product_id = $request->getQueryData("product_id");
    $status = $product_model->delete(['product_id' => $product_id]);
    if ($status) {
        echo "<script>alert('Data deleted successfully')</script>";
        echo "<script>location. href='?list=product'</script>";
    }
} elseif ($request->getQueryData('action') == 'delete' && $request->getQueryData('cat_id')) {
    $category_model = new Model_Category();

    $cat_id = $request->getQueryData("cat_id");
    $status = $category_model->delete(['cat_id' => $cat_id]);
    if ($status) {
        echo "<script>alert('Data deleted successfully')</script>";
        echo "<script>location. href='?list=category'</script>";
    }
} elseif ($request->getQueryData('action') == 'update' && $request->getQueryData('cat_id')) {
    echo "Category Update";
} elseif ($request->getPostData('submit') && $request->getPostData('ccc_product')) {
    $product_model = new Model_Product();

    $data = $request->getPostData('ccc_product');
    $result = $product_model->save($data);
    if ($result) {
        echo "<script>alert('Data submitted successfully')</script>";
        echo "<script>location. href='?form=product'</script>";
    } else {
        echo "<script>alert('Data not submitted')</script>";
    }
} elseif ($request->getPostData('update') && $request->getPostData('ccc_product')) {
    $product_model = new Model_Product();

    $data = $request->getPostData('ccc_product');
    $result = $product_model->update($data, ['product_id' => $request->getQueryData('product_id')]);
    if ($result) {
        echo "<script>alert('Data updated successfully')</script>";
        echo "<script>location. href='?list=product'</script>";
    } else {
        echo "<script>alert('Data not updated')</script>";
    }
} elseif ($request->getQueryData('action') == 'update' && $request->getQueryData('product_id')) {
    $product_model = new Model_Product();
    $product_view = new View_Product();

    $query = $abstract->getQueryBuilder()->select('ccc_category', ['*']);
    $categories = $abstract->getQueryBuilder()->execute($query);
    $categories = $abstract->getQueryExecutor()->fetchValues($categories, ['cat_id', 'cat_name']);

    $product_id = $request->getQueryData("product_id");
    $product = $product_model->fetchOne(['*'], ['WHERE ' => "product_id = {$product_id}"]);
    echo $product_view->toHTML($categories, product: $product);
} elseif ($request->getPostData('submit') && $request->getPostData('ccc_category')) {
    $category_model = new Model_Category();

    $data = $request->getPostData('ccc_category');
    $result = $category_model->save($data);
    if ($result) {
        echo "<script>alert('Data submitted successfully')</script>";
        echo "<script>location. href='?form=category'</script>";
    } else {
        echo "<script>alert('Data not submitted')</script>";
    }
} else {
    echo "<a href='?form=product' class='link'>Add Product</a>";
    echo "<a href='?list=product' class='link'>View Product</a>";
    echo "<a href='?form=category' class='link'>Add Category</a>";
    echo "<a href='?list=category' class='link'>View Category</a>";
}