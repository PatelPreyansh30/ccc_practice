<?php
class View_Product_List
{
    public $product = [];
    public function __construct()
    {
        $product_model = new Model_Product();
        $this->product = $product_model->fetch(['*']);
    }
    
    public function renderTable($product)
    {
        $table = "<table>";
        $table .= $this->renderTableHead();
        $table .= $this->renderTableBody($product);
        $table .= "</table>";
        $table .= "<a href='?form=product' class='link'>Add Product</a>";
        $table .= "<a href='?form=category' class='link'>Add Category</a>";
        $table .= "<a href='?list=category' class='link'>View Category</a>";
        return $table;
    }
    public function renderTableBody($product)
    {
        $tableBody = '<tbody>';
        foreach ($product as $dataObject) {
            $tableBody .= "<tr>";
            $tableBody .= "<td>{$dataObject->getProduct_id()}</td>";
            $tableBody .= "<td>{$dataObject->getProduct_name()}</td>";
            $tableBody .= "<td>{$dataObject->getCat_id()}</td>";
            $tableBody .= "<td>{$dataObject->getProduct_sku()}</td>";
            $tableBody .= "<td>{$dataObject->getProduct_type()}</td>";
            $tableBody .= "<td>{$dataObject->getManufacturer_cost()}</td>";
            $tableBody .= "<td>{$dataObject->getShipping_cost()}</td>";
            $tableBody .= "<td>{$dataObject->getTotal_cost()}</td>";
            $tableBody .= "<td>{$dataObject->getProduct_price()}</td>";
            $tableBody .= "<td>{$dataObject->getProduct_status()}</td>";
            $tableBody .= "<td>{$dataObject->getProduct_created_at()}</td>";
            $tableBody .= "<td>{$dataObject->getProduct_updated_at()}</td>";
            $tableBody .= "<td><a href='?action=delete&product_id={$dataObject->getProduct_id()}'>Delete</a></td>";
            $tableBody .= "<td><a href='?action=update&product_id={$dataObject->getProduct_id()}'>Update</a></td>";
            $tableBody .= "</tr>";
        }
        $tableBody .= "</tbody>";
        return $tableBody;
    }
    public function renderTableHead()
    {
        $tableHead = '<thead><tr>';
        $headData = ["Id", "Name", "Category", "SKU", "Type", "Manufacturer Cost", "Shipping Cost", "Total Cost", "Price", "Status", "Created At", "Updated At", "Delete", "Update"];
        foreach ($headData as $value) {
            $tableHead .= "<th>{$value}</th>";
        }
        $tableHead .= "</tr></thead>";
        return $tableHead;
    }
    // public function toHtml($product, $category)
    public function toHtml()
    {
        return $this->renderTable($this->product);
        // return "Product List";
    }
}