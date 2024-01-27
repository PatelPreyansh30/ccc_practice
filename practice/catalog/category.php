<?php
include "sql/functions.php";

$cat_name = "";
$button_text = "submit";

// Deleting for product
if (getParams('action') == 'delete' && getParams('cat_id')) {
    $status = deleteQuery('ccc_category', ['cat_id' => getParams('cat_id')]);
    if ($status->num_rows > 0) {
        echo "<script>alert('Data deleted successfully')</script>";
        echo "<script>location. href='category_list.php'</script>";
    } else {
        echo "<script>alert('Data not deleted')</script>";
        echo "<script>location. href='category_list.php'</script>";
    };
};

// Updating category
if (getParams('action') == 'update' && getParams('cat_id')) {
    $single_category = whereBasedSelect('ccc_category', ['cat_id' => getParams('cat_id')]);
    if ($single_category->num_rows > 0) {
        $single_category = $single_category->fetch_assoc();
        $cat_name = $single_category['cat_name'];
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
        $update_query = update($keys[$i], ['cat_id' => getParams('cat_id')], getParams($keys[$i]));
        if ($update_query) {
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
    <a href="category_list.php" class="link">View Category</a>
</body>

</html>