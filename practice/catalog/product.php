<?php
include "sql/functions.php";

$product_name = "";
$product_sku = "";
$product_type = "";
$product_category = "";
$manufacturer_cost = "";
$shipping_cost = "";
$total_cost = "";
$product_price = "";
$product_status = "";
$product_created_at = "";
$product_updated_at = "";
$button_text = "submit";

// Deleting for product
if (getParams('action') == 'delete' && getParams('product_id')) {
    $status = deleteQuery('ccc_product', ['product_id' => getParams('product_id')]);
    if ($status->num_rows > 0) {
        echo "<script>alert('Data deleted successfully')</script>";
        echo "<script>location. href='product_list.php'</script>";
    } else {
        echo "<script>alert('Data not found')</script>";
        echo "<script>location. href='product_list.php'</script>";
    };
};

// Updating products
if (getParams('action') == 'update' && getParams('product_id')) {
    $single_product = whereBasedSelect('ccc_product', ['product_id' => getParams('product_id')]);
    if ($single_product && $single_product->num_rows > 0) {
        $single_product = $single_product->fetch_assoc();
        $product_name = $single_product['product_name'];
        $product_sku = $single_product['product_sku'];
        $product_type = $single_product['product_type'];
        $product_category = $single_product['cat_id'];
        $manufacturer_cost = $single_product['manufacturer_cost'];
        $shipping_cost = $single_product['shipping_cost'];
        $total_cost = $single_product['total_cost'];
        $product_price = $single_product['product_price'];
        $product_status = $single_product['product_status'];
        $product_created_at = $single_product['product_created_at'];
        $product_updated_at = $single_product['product_updated_at'];
        $button_text = 'update';
    } else {
        echo "<script>alert('Data not found')</script>";
    };
};

$category = select('ccc_category', 'cat_id', ['*']);

// Inserting data
if (getParams('submit')) {
    $keys = getKeysFromPostRequest();
    for ($i = 0; $i < count($keys); $i++) {
        $insert_query = insert($keys[$i], getParams($keys[$i]));
        if ($insert_query) {
            echo "<script>alert('Data submitted successfully')</script>";
        } else {
            echo "<script>alert('Data not submitted')</script>";
        }
    };
};

// Updating data
if (getParams('update')) {
    $keys = getKeysFromPostRequest();
    for ($i = 0; $i < count($keys); $i++) {
        $update_query = update($keys[$i], ['product_id' => getParams('product_id')], getParams($keys[$i]));
        if ($update_query) {
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>location. href='product_list.php'</script>";
        } else {
            echo "<script>alert('Data not updated')</script>";
            echo "<script>location. href='product_list.php'</script>";
        }
    };
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
            <input type="text" value="<?php echo $product_name ?>" name="ccc_product[product_name]" id="product_name">
        </div>
        <div>
            <label for="product_sku">Product SKU: </label>
            <input type="text" value="<?php echo $product_sku ?>" name="ccc_product[product_sku]" id="product_sku">
        </div>
        <div>
            <label>Product Type: </label>
            <div>
                <input type="radio" <?php echo $product_type == 'simple' ? 'checked' : '' ?> name="ccc_product[product_type]" id="product_type_simple" value="simple">
                <label for="product_type_simple">Simple</label>
                <input type="radio" <?php echo $product_type == 'bundle' ? 'checked' : ''  ?> name="ccc_product[product_type]" id="product_type_Bundle" value="bundle">
                <label for="product_type_Bundle">Bundle</label>
            </div>
        </div>
        <div>
            <label for="product_category">Category:</label>
            <select name="ccc_product[cat_id]" id="product_category">
                <?php
                if ($category->num_rows > 0) {
                    while ($row = $category->fetch_assoc()) {
                        $selected = $row['cat_id'] == $product_category ? 'selected' : '';
                        echo "<option {$selected} value='{$row['cat_id']}'>{$row['cat_name']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label for="manufacturer_cost">Manufacturer Cost: </label>
            <input type="text" value="<?php echo $manufacturer_cost ?>" name="ccc_product[manufacturer_cost]" id="manufacturer_cost">
        </div>
        <div>
            <label for="shipping_cost">Shipping Cost: </label>
            <input type="text" value="<?php echo $shipping_cost ?>" name="ccc_product[shipping_cost]" id="shipping_cost">
        </div>
        <div>
            <label for="total_cost">Total Cost: </label>
            <input type="text" value="<?php echo $total_cost ?>" name="ccc_product[total_cost]" id="total_cost">
        </div>
        <div>
            <label for="product_price">Price: </label>
            <input type="text" value="<?php echo $product_price ?>" name="ccc_product[product_price]" id="product_price">
        </div>
        <div>
            <label for="product_status">Status:</label>
            <select name="ccc_product[product_status]" id="product_status">
                <option <?php echo $product_status == 'enabled' ? 'selected' : false; ?> value='enabled'>Enabled</option>;
                <option <?php echo $product_status == 'disabled' ? 'selected' : false; ?> value='disabled'>Disabled</option>;
            </select>
        </div>
        <div>
            <label for="product_created_at">Created At: </label>
            <input type="date" value="<?php echo $product_created_at ?>" name="ccc_product[product_created_at]" id="product_created_at">
        </div>
        <div>
            <label for="product_updated_at">Updated At: </label>
            <input type="date" value="<?php echo $product_updated_at ?>" name="ccc_product[product_updated_at]" id="product_updated_at">
        </div>
        <?php
        $uppercase = ucwords($button_text);
        echo "<input type='submit' name='$button_text' value='$uppercase' id='submit'>";
        ?>
    </form>
    <a href="product_list.php" class="link">View Products</a>
</body>

</html>