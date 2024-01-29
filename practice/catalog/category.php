<?php
include "sql/functions.php";

$cat_name = "";
$button_text = "submit";

// Deleting for product
if (getParams('action') == 'delete' && getParams('cat_id')) {
    $query = deleteQuery('ccc_category', ['cat_id' => getParams('cat_id')]);
    $status = queryExecutor($query);
    if ($status) {
        echo "<script>alert('Data deleted successfully')</script>";
        echo "<script>location. href='category_list.php'</script>";
    } else {
        echo "<script>alert('Data not deleted')</script>";
        echo "<script>location. href='category_list.php'</script>";
    };
};

// Updating category
if (getParams('action') == 'update' && getParams('cat_id')) {
    $cat_id = getParams('cat_id');
    $query = selectQuery('ccc_category', ['*'], ['WHERE ' => "cat_id = {$cat_id}"]);
    $single_category = queryExecutor($query);
    if ($single_category->num_rows > 0) {
        $single_category = $single_category->fetch_assoc();
        $cat_name = $single_category['cat_name'];
        $button_text = 'update';
    } else {
        echo "<script>alert('Data not found')</script>";
    };
};

$query = selectQuery('ccc_category', ['*']);
$category = queryExecutor($query);

// Inserting data
if (getParams('submit')) {
    $keys = getKeysFromPostRequest();
    for ($i = 0; $i < count($keys); $i++) {
        $query = insertQuery($keys[$i], getParams($keys[$i]));
        $status = queryExecutor($query);
        if ($status) {
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
        $query = updateQuery($keys[$i], ['cat_id' => getParams('cat_id')], getParams($keys[$i]));
        $status = queryExecutor($query);
        if ($status) {
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>location. href='category_list.php'</script>";
        } else {
            echo "<script>alert('Data not updated')</script>";
            echo "<script>location. href='category_list.php'</script>";
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
            <label for="cat_name">Category Name: </label>
            <input type="text" value="<?php echo $cat_name ?>" name="ccc_category[cat_name]" id="cat_name">
        </div>
        <?php
        $uppercase = ucwords($button_text);
        echo "<input type='submit' name='$button_text' value='$uppercase' id='submit'>";
        ?>
    </form>
    <a href="category_list.php" class="link">View Categories</a>
    <a href="product_list.php" class="link">View Products</a>
    <a href="product.php" class="link">Add Products</a>
</body>

</html>