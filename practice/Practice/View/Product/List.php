<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
    }

    .link {
        display: block;
        margin-top: 10px;
    }
</style>

<?php
class View_Product_List
{
    public function __construct()
    {
    }

    public function renderTable($data)
    {
        $table = "<table>";
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

    public function toHTML($data)
    {
        return $this->renderTable($data);
    }

}