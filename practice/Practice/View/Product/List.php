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
        foreach ($product as $value) {
            $table_body .= "<tr>";
            $table_body .= "<td>{$value['product_id']}</td>";
            $table_body .= "<td>{$value['product_name']}</td>";
            $table_body .= "<td>{$category[$value['cat_id']]}</td>";
            $table_body .= "<td><a href='?action=delete&product_id={$value['product_id']}'>Delete</a></td>";
            $table_body .= "<td><a href='?action=update&product_id={$value['product_id']}'>Update</a></td>";
            $table_body .= "</tr>";
        }
        $table_body .= "</tbody>";
        return $table_body;
    }
    public function renderTableHead()
    {
        $table_head = '<thead><tr>';
        $head_data = ["Id", "Name", "Category", "Delete", "Update"];
        foreach ($head_data as $value) {
            $table_head .= "<th>{$value}</th>";
        }
        $table_head .= "</tr></thead>";
        return $table_head;
    }
    public function toHTML($product, $category)
    {
        return $this->renderTable($product, $category);
    }
}