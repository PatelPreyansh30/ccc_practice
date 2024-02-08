<?php

include("Lib/autoload.php");

class Ccc
{
    public static function init()
    {
        $frontController = new Controller_Front();
        echo $frontController->init();
    }
}

Ccc::init();
// $request = new Model_Request();
// $abstract = new Model_Abstract();

// switch (!$request->isPost()) {
//     case $request->getQueryData('list'):
//         if ($request->getQueryData('list') == 'product') {
//             $product_model = new Model_Product();

//             $query = $abstract->getQueryBuilder()->select('ccc_category', ['*']);
//             $categories = $abstract->getQueryBuilder()->execute($query);
//             $categories = $abstract->getQueryExecutor()->fetchValues($categories, ['cat_id', 'cat_name']);

//             $product_list_view = new View_Product_List();
//             echo $product_list_view->toHTML($product_model->fetch(['*']), $categories);
//             break;
//         } elseif ($request->getQueryData('list') == 'category') {
//             $category_model = new Model_Category();
//             $category_list_view = new View_Category_List();

//             echo $category_list_view->toHTML($category_model->fetch(['*']));
//             break;
//         }
//         break;
//     case $request->getQueryData('form'):
//         if ($request->getQueryData('form') == 'category') {
//             $category_view = new View_Category();
//             echo $category_view->toHTML();
//             break;
//         } elseif ($request->getQueryData('form') == 'product') {
//             $query = $abstract->getQueryBuilder()->select('ccc_category', ['*']);
//             $categories = $abstract->getQueryBuilder()->execute($query);
//             $categories = $abstract->getQueryExecutor()->fetchValues($categories, ['cat_id', 'cat_name']);

//             $product_view = new View_Product();
//             echo $product_view->toHTML($categories);
//             break;
//         }
//         break;
//     case $request->getQueryData('action') == 'delete':
//         if ($request->getQueryData('product_id')) {
//             $product_model = new Model_Product();

//             $product_id = $request->getQueryData("product_id");
//             $status = $product_model->delete(['product_id' => $product_id]);
//             if ($status) {
//                 echo "<script>alert('Data deleted successfully')</script>";
//                 echo "<script>location. href='?list=product'</script>";
//             }
//             break;
//         } elseif ($request->getQueryData('cat_id')) {
//             $category_model = new Model_Category();

//             $cat_id = $request->getQueryData("cat_id");
//             $status = $category_model->delete(['cat_id' => $cat_id]);
//             if ($status) {
//                 echo "<script>alert('Data deleted successfully')</script>";
//                 echo "<script>location. href='?list=category'</script>";
//             }
//             break;
//         }
//         break;
//     case $request->getQueryData('action') == 'update':
//         if ($request->getQueryData('cat_id')) {
//             echo "Category Update";
//             break;
//         } elseif ($request->getQueryData('product_id')) {
//             $product_model = new Model_Product();
//             $product_view = new View_Product();

//             $query = $abstract->getQueryBuilder()->select('ccc_category', ['*']);
//             $categories = $abstract->getQueryBuilder()->execute($query);
//             $categories = $abstract->getQueryExecutor()->fetchValues($categories, ['cat_id', 'cat_name']);

//             $product_id = $request->getQueryData("product_id");
//             $product = $product_model->fetchOne(['*'], ['WHERE ' => "product_id = {$product_id}"]);
//             echo $product_view->toHTML($categories, product: $product);
//             break;
//         }
//         break;
//     default:
//         echo "<a href='?form=product' class='link'>Add Product</a>";
//         echo "<a href='?list=product' class='link'>View Product</a>";
//         echo "<a href='?form=category' class='link'>Add Category</a>";
//         echo "<a href='?list=category' class='link'>View Category</a>";
//         break;
// }

// switch ($request->isPost()) {
//     case $request->getPostData('submit'):
//         if ($request->getPostData('ccc_product')) {
//             $product_model = new Model_Product();

//             $data = $request->getPostData('ccc_product');
//             $result = $product_model->save($data);
//             if ($result) {
//                 echo "<script>alert('Data submitted successfully')</script>";
//                 echo "<script>location. href='?form=product'</script>";
//             } else {
//                 echo "<script>alert('Data not submitted')</script>";
//             }
//             break;
//         } elseif ($request->getPostData('ccc_category')) {
//             $category_model = new Model_Category();

//             $data = $request->getPostData('ccc_category');
//             $result = $category_model->save($data);
//             if ($result) {
//                 echo "<script>alert('Data submitted successfully')</script>";
//                 echo "<script>location. href='?form=category'</script>";
//             } else {
//                 echo "<script>alert('Data not submitted')</script>";
//             }
//         }
//         break;
//     case $request->getPostData('update'):
//         if ($request->getPostData('ccc_product')) {
//             $product_model = new Model_Product();

//             $data = $request->getPostData('ccc_product');
//             $result = $product_model->update($data, ['product_id' => $request->getQueryData('product_id')]);
//             if ($result) {
//                 echo "<script>alert('Data updated successfully')</script>";
//                 echo "<script>location. href='?list=product'</script>";
//             } else {
//                 echo "<script>alert('Data not updated')</script>";
//             }
//             break;
//         } elseif ($request->getPostData('ccc_category')) {
//             break;
//         }
//         break;
// }