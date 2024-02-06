<?php
class View_Product_List
{
    public function __construct()
    {
    }
    public function renderTable($product, $category)
    {
        $table = "<table>";
        $table .= $this->renderTableHead();
        $table .= $this->renderTableBody($product, $category);
        $table .= "</table>";
        $table .= "<a href='?form=product' class='link'>Add Product</a>";
        $table .= "<a href='?form=category' class='link'>Add Category</a>";
        $table .= "<a href='?list=category' class='link'>View Category</a>";
        return $table;
    }
    public function renderTableBody($product, $category)
    {
        $table_body = '<tbody>';
        foreach ($product as $data_object) {
            $table_body .= "<tr>";
            $table_body .= "<td>{$data_object->getProduct_id()}</td>";
            $table_body .= "<td>{$data_object->getProduct_name()}</td>";
            $table_body .= "<td>{$category[$data_object->getCat_id()]}</td>";
            $table_body .= "<td>{$data_object->getProduct_sku()}</td>";
            $table_body .= "<td>{$data_object->getProduct_type()}</td>";
            $table_body .= "<td>{$data_object->getManufacturer_cost()}</td>";
            $table_body .= "<td>{$data_object->getShipping_cost()}</td>";
            $table_body .= "<td>{$data_object->getTotal_cost()}</td>";
            $table_body .= "<td>{$data_object->getProduct_price()}</td>";
            $table_body .= "<td>{$data_object->getProduct_status()}</td>";
            $table_body .= "<td>{$data_object->getProduct_created_at()}</td>";
            $table_body .= "<td>{$data_object->getProduct_updated_at()}</td>";
            $table_body .= "<td><a href='?action=delete&product_id={$data_object->getProduct_id()}'>Delete</a></td>";
            $table_body .= "<td><a href='?action=update&product_id={$data_object->getProduct_id()}'>Update</a></td>";
            $table_body .= "</tr>";
        }
        $table_body .= "</tbody>";
        return $table_body;
    }
    public function renderTableHead()
    {
        $table_head = '<thead><tr>';
        $head_data = ["Id", "Name", "Category", "SKU", "Type", "Manufacturer Cost", "Shipping Cost", "Total Cost", "Price", "Status", "Created At", "Updated At", "Delete", "Update"];
        foreach ($head_data as $value) {
            $table_head .= "<th>{$value}</th>";
        }
        $table_head .= "</tr></thead>";
        return $table_head;
    }
    // public function toHtml($product, $category)
    public function toHtml()
    {
        // return $this->renderTable($product, $category);
        echo "Product List";
    }
}