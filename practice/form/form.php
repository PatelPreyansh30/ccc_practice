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
    <form action="php_function.php" method="post">
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
                <input type="radio" name="ccc_product[product_type]" id="product_type_simple" value="simple">
                <label for="product_type_simple">Simple</label>
                <input type="radio" name="ccc_product[product_type]" id="product_type_Bundle" value="bundle">
                <label for="product_type_Bundle">Bundle</label>
            </div>
        </div>
        <div>
            <label for="product_category">Category:</label>
            <select name="ccc_product[product_category]" id="product_category">
                <option value="bar_and_game_room">Bar & Game Room</option>
                <option value="bedroom">Bedroom</option>
                <option value="decor">Decor</option>
                <option value="dining_and_kitchen">Dining & Kitchen</option>
                <option value="lighting">Lighting</option>
                <option value="living_room">Living Room</option>
                <option value="mattresses">Mattresses</option>
                <option value="office">Office</option>
                <option value="outdoor">Outdoor</option>
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
                <option value="enabled">Enabled</option>
                <option value="disabled">Disabled</option>
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
        <input type="submit" name="submit" value="Submit" id="submit">
    </form>
    <a href="list.php" class="link">View Products</a>
</body>

</html>