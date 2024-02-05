<?php

class View_Category_List
{
    public function __construct()
    {
    }
    public function renderTable($category)
    {
        $table = "<table>";
        $table .= $this->renderTableHead();
        $table .= $this->renderTableBody($category);
        $table .= "</table>";
        $table .= "<a href='?form=category' class='link'>Add Category</a>";
        $table .= "<a href='?form=product' class='link'>Add Product</a>";
        $table .= "<a href='?list=product' class='link'>View Product</a>";
        return $table;
    }
    public function renderTableBody($category)
    {
        $table_body = '<tbody>';
        foreach ($category as $data_object) {
            $table_body .= "<tr>";
            $table_body .= "<td>{$data_object->getCat_id()}</td>";
            $table_body .= "<td>{$data_object->getCat_name()}</td>";
            $table_body .= "<td><a href='?action=delete&cat_id={$data_object->getCat_id()}'>Delete</a></td>";
            $table_body .= "<td><a href='?action=update&cat_id={$data_object->getCat_id()}'>Update</a></td>";
            $table_body .= "</tr>";
        }
        $table_body .= "</tbody>";
        return $table_body;
    }
    public function renderTableHead()
    {
        $table_head = '<thead><tr>';
        $head_data = ["Id", "Name", "Delete", "Update"];
        foreach ($head_data as $value) {
            $table_head .= "<th>{$value}</th>";
        }
        $table_head .= "</tr></thead>";
        return $table_head;
    }
    public function toHTML($category)
    {
        return $this->renderTable($category);
    }
}