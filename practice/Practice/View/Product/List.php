<?php

class View_Product_List
{
    public function __construct()
    {
    }

    public function renderTable($data)
    {
        $table = "<table style='border: 1px solid black; border-collapse: collapse;'>";
        $table .= $this->renderTableHead();
        $table .= $this->renderTableBody($data);
        return $table;
    }

    public function renderTableBody($data)
    {
        $table_body = '<tbody>';
        foreach ($data as $value) {
            $table_body .= "<tr>";
            $table_body .= "<td>{$value['product_id']}</td>";
            $table_body .= "<td>{$value['product_name']}</td>";
            $table_body .= "<td>{$value['cat_id']}</td>";
            $table_body .= "<td>Delete</td>";
            $table_body .= "<td>Update</td>";
            $table_body .= "<tr>";
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

    public function toHTML($data)
    {
        return $this->renderTable($data);
    }

}