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
        $tableBody = '<tbody>';
        foreach ($category as $dataObject) {
            $tableBody .= "<tr>";
            $tableBody .= "<td>{$dataObject->getCat_id()}</td>";
            $tableBody .= "<td>{$dataObject->getCat_name()}</td>";
            $tableBody .= "<td><a href='?action=delete&cat_id={$dataObject->getCat_id()}'>Delete</a></td>";
            $tableBody .= "<td><a href='?action=update&cat_id={$dataObject->getCat_id()}'>Update</a></td>";
            $tableBody .= "</tr>";
        }
        $tableBody .= "</tbody>";
        return $tableBody;
    }
    public function renderTableHead()
    {
        $tableHead = '<thead><tr>';
        $head_data = ["Id", "Name", "Delete", "Update"];
        foreach ($head_data as $value) {
            $tableHead .= "<th>{$value}</th>";
        }
        $tableHead .= "</tr></thead>";
        return $tableHead;
    }
    // public function toHTML($category)
    public function toHTML()
    {
        // return $this->renderTable($category);
        return "Category list";
    }
}