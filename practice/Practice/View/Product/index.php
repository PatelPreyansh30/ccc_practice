<?php
class View_Product
{
    public function __construct()
    {
    }

    private function renderForm($categories, $product)
    {
        if ($product) {
            $form = "<form action='' method='POST'>";
            $form .= $this->renderTextField("ccc_product[product_name]", "Product Name: ", $product->getProduct_name());
            $form .= $this->renderTextField("ccc_product[product_sku]", "Product SKU: ", $product->getProduct_sku());
            $form .= $this->renderRadioButton("ccc_product[product_type]", "Product Type: ", ['simple', 'bundle'], 'product_type', $product->getProduct_type());
            $form .= $this->renderDropdown('ccc_product[cat_id]', "Category: ", $categories, $product->getCat_id(), 'product_category');
            $form .= $this->renderTextField("ccc_product[manufacturer_cost]", "Manufacturer Cost: ", $product->getManufacturer_cost());
            $form .= $this->renderTextField("ccc_product[shipping_cost]", "Shipping Cost: ", $product->getShipping_cost());
            $form .= $this->renderTextField("ccc_product[total_cost]", "Total Cost: ", $product->getTotal_cost());
            $form .= $this->renderTextField("ccc_product[product_price]", "Price: ", $product->getProduct_price());
            $form .= $this->renderDropdown('ccc_product[product_status]', "Status: ", [
                "enabled" => 'Enabled',
                "disabled" => 'Disabled',
            ], $product->getProduct_status(), 'product_status');
            $form .= $this->renderDateField("ccc_product[product_created_at]", "Created At: ", $product->getProduct_created_at());
            $form .= $this->renderDateField("ccc_product[product_updated_at]", "Updated At: ", $product->getProduct_updated_at());
            $form .= $this->renderUpdateButton();
            $form .= "<a href='?list=product' class='link'>View Product</a>";
            $form .= "<a href='?list=category' class='link'>View Category</a>";
            $form .= "<a href='?form=category' class='link'>Add Category</a>";
        } else {
            $form = "<form action='' method='POST'>";
            $form .= $this->renderTextField("ccc_product[product_name]", "Product Name: ", '');
            $form .= $this->renderTextField("ccc_product[product_sku]", "Product SKU: ", '');
            $form .= $this->renderRadioButton("ccc_product[product_type]", "Product Type: ", ['simple', 'bundle'], 'product_type', '');
            $form .= $this->renderDropdown('ccc_product[cat_id]', "Category: ", $categories, '', 'product_category');
            $form .= $this->renderTextField("ccc_product[manufacturer_cost]", "Manufacturer Cost: ", '');
            $form .= $this->renderTextField("ccc_product[shipping_cost]", "Shipping Cost: ", '');
            $form .= $this->renderTextField("ccc_product[total_cost]", "Total Cost: ", '');
            $form .= $this->renderTextField("ccc_product[product_price]", "Price: ", '');
            $form .= $this->renderDropdown('ccc_product[product_status]', "Status: ", [
                "enabled" => 'Enabled',
                "disabled" => 'Disabled',
            ], '', 'product_status');
            $form .= $this->renderDateField("ccc_product[product_created_at]", "Created At: ", '');
            $form .= $this->renderDateField("ccc_product[product_updated_at]", "Updated At: ", '');
            $form .= $this->renderSubmitButton();
            $form .= "<a href='?list=product' class='link'>View Product</a>";
            $form .= "<a href='?list=category' class='link'>View Category</a>";
            $form .= "<a href='?form=category' class='link'>Add Category</a>";
        }
        return $form;
    }

    private function renderTextField($name, $label, $value = '')
    {
        $textfield = "
        <div>
            <label for={$name}>{$label}</label>
            <input type='text' name={$name} id={$name} value='{$value}'>
        </div>
        ";
        return $textfield;
    }
    private function renderDateField($name, $label, $value = '')
    {
        $datefield = "
        <div>
            <label for={$name}>{$label}</label>
            <input type='date' name={$name} id={$name} value='{$value}'>
        </div>
        ";
        return $datefield;
    }

    private function renderSubmitButton()
    {
        $textfield = "
        <div>
            <input type='submit' name='submit' value='Submit' id='submit'>
        </div>
        ";
        return $textfield;
    }
    private function renderUpdateButton()
    {
        $textfield = "
        <div>
            <input type='submit' name='update' value='Update' id='update'>
        </div>
        ";
        return $textfield;
    }

    private function renderDropdown($name, $title, $options = array(), $selected = '', $id = '')
    {
        $dropdown = '<div>' . $title;
        $dropdown .= "<select id={$id} name={$name}>";
        foreach ($options as $key => $value) {
            $selectedAttr = ($key == $selected) ? 'selected="selected"' : '';
            $dropdown .= "<option value={$key} class={$id} {$selectedAttr}>{$value}</option>";
        }
        $dropdown .= '</select>' . '</div>';
        return $dropdown;
    }

    private function renderRadioButton(string $name, string $label, array $radioBtnFields, string $class, $checked = '')
    {
        $fields = [];
        foreach ($radioBtnFields as $key => $value) {
            $checkedAttr = ($value == $checked) ? "checked" : '';
            $capital_field = ucfirst($value);
            $fields[] = "
            <span>
                <input type='radio' name={$name} id={$value} value={$value} {$checkedAttr} class={$class}>
                <label for={$value}>{$capital_field}</label>
            </span>
        ";
        }
        $fields = join(" ", $fields);
        $radiofield = "
        <div>
            <label>{$label}</label>
            {$fields}
        </div>
        ";
        return $radiofield;
    }

    public function toHTML($categories, $product = null)
    {
        return $this->renderForm($categories, $product);
    }
}