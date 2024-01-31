<?php
include "sql/builder_and_executor.php";
include "sql/functions.php";

$ccc_category_object = new QueryBuilder("ccc_category");
$query_executor_object = new QueryExecutor();

$query = $ccc_category_object->selectQuery(['*']);
$category = $query_executor_object->selectQueryExecutor($query);

$ccc_product_object = new QueryBuilder("ccc_product");
$query_executor_object = new QueryExecutor();

// Deleting for product
if (getParams('action') == 'delete' && getParams('product_id')) {
    $query = $ccc_product_object->deleteQuery(['product_id' => getParams('product_id')]);
    $status = $query_executor_object->otherQueryExecutor($query);
    if ($status) {
        echo "<script>alert('Data deleted successfully')</script>";
        echo "<script>location. href='product_list.php'</script>";
    } else {
        echo "<script>alert('Data not found')</script>";
        echo "<script>location. href='product_list.php'</script>";
    };
};

// Inserting data
if (getParams('submit')) {
    $query = $ccc_product_object->insertQuery(getParams('ccc_product'));
    $status = $query_executor_object->otherQueryExecutor($query);
    if ($status) {
        echo "<script>alert('Data submitted successfully')</script>";
    } else {
        echo "<script>alert('Data not submitted')</script>";
    }
};

// Updating data
if (getParams('update')) {
    $query = $ccc_product_object->updateQuery(getParams('ccc_product'), ['product_id' => getParams('product_id')]);
    $status = $query_executor_object->otherQueryExecutor($query);
    if ($status) {
        echo "<script>alert('Data updated successfully')</script>";
        echo "<script>location. href='product_list.php'</script>";
    } else {
        echo "<script>alert('Data not updated')</script>";
        echo "<script>location. href='product_list.php'</script>";
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<style>
    div {
        margin: 1rem 0;
    }

    .link {
        display: block;
        margin-top: 10px;
    }
</style>

<body>
    <form action="" method="post">
        <div>
            <label for="product_name">Product Name: </label>
            <input type="text" name="ccc_product[product_name]" id="product_name">
        </div>
        <div>
            <label for="product_sku">Product SKU: </label>
            <input type="text" name="ccc_product[product_sku]" id="product_sku">
        </div>
        <div>
            <label>Product Type: </label>
            <div>
                <input type="radio" name="ccc_product[product_type]" id="product_type_simple" value="simple" class="product_type">
                <label for="product_type_simple">Simple</label>
                <input type="radio" name="ccc_product[product_type]" id="product_type_Bundle" value="bundle" class="product_type">
                <label for="product_type_Bundle">Bundle</label>
                <!-- <input type="radio" <?php echo $product_type == 'simple' ? 'checked' : '' ?> name="ccc_product[product_type]" id="product_type_simple" value="simple"> -->
                <!-- <input type="radio" <?php echo $product_type == 'bundle' ? 'checked' : ''  ?> name="ccc_product[product_type]" id="product_type_Bundle" value="bundle"> -->
            </div>
        </div>
        <div>
            <label for="product_category">Category:</label>
            <select name="ccc_product[cat_id]" id="product_category">
                <?php
                if ($category != null) {
                    for ($i = 0; $i < count($category); $i++) {
                        echo "<option class='product_category' value='{$category[$i]['cat_id']}'>{$category[$i]['cat_name']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label for="manufacturer_cost">Manufacturer Cost: </label>
            <input type="text" name="ccc_product[manufacturer_cost]" id="manufacturer_cost">
        </div>
        <div>
            <label for="shipping_cost">Shipping Cost: </label>
            <input type="text" name="ccc_product[shipping_cost]" id="shipping_cost">
        </div>
        <div>
            <label for="total_cost">Total Cost: </label>
            <input type="text" name="ccc_product[total_cost]" id="total_cost">
        </div>
        <div>
            <label for="product_price">Price: </label>
            <input type="text" name="ccc_product[product_price]" id="product_price">
        </div>
        <div>
            <label for="product_status">Status:</label>
            <select name="ccc_product[product_status]" id="product_status">
                <option value='enabled' class="product_status">Enabled</option>;
                <option value='disabled' class="product_status">Disabled</option>;
            </select>
        </div>
        <div>
            <label for="product_created_at">Created At: </label>
            <input type="date" name="ccc_product[product_created_at]" id="product_created_at">
        </div>
        <div>
            <label for="product_updated_at">Updated At: </label>
            <input type="date" name="ccc_product[product_updated_at]" id="product_updated_at">
        </div>
        <input type='submit' name='submit' value='Submit' id='submit'>
    </form>
    <a href="product_list.php" class="link">View Products</a>
    <a href="category_list.php" class="link">View Categories</a>
    <a href="category.php" class="link">Add Categories</a>

    <script>
        var product = <?php
                        $product_id = getParams('product_id');
                        $query = $ccc_product_object->selectQuery(['*'], ['WHERE ' => "product_id = {$product_id}"]);
                        $single_product = $query_executor_object->selectQueryExecutor($query);
                        echo json_encode($single_product[0]);
                        ?>;
        document.getElementById("product_name").value = product.product_name
        document.getElementById("product_sku").value = product.product_sku
        document.getElementById("manufacturer_cost").value = product.manufacturer_cost
        document.getElementById("shipping_cost").value = product.shipping_cost
        document.getElementById("total_cost").value = product.total_cost
        document.getElementById("product_price").value = product.product_price
        document.getElementById("product_created_at").value = product.product_created_at
        document.getElementById("product_updated_at").value = product.product_updated_at
        document.getElementById("submit").value = "Update"
        document.getElementById("submit").name = "update"

        var product_type = document.getElementsByClassName("product_type")
        for (let i = 0; i < product_type.length; i++) {
            if (product.product_type == product_type[i].value) {
                product_type[i].checked = 'checked';
            }
        }

        var product_category = document.getElementsByClassName("product_category")
        for (let i = 0; i < product_category.length; i++) {
            if (product.cat_id == product_category[i].value) {
                product_category[i].selected = 'selected';
            }
        }

        var product_status = document.getElementsByClassName("product_status")
        for (let i = 0; i < product_status.length; i++) {
            if (product.product_status == product_status[i].value) {
                product_status[i].selected = 'selected';
            }
        }
    </script>
</body>

</html>