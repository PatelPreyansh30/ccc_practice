<?php

class Lib_Sql_QueryBuilder extends Lib_Connection
{
    public function __construct()
    {
    }

    public function insert(string $table_name, array $data)
    {
        $columns = $values = [];
        foreach ($data as $col => $val) {
            $columns[] = "`$col`";
            $values[] = "'" . addslashes($val) . "'";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", $values);
        return "INSERT INTO {$table_name} ({$columns}) VALUES ({$values})";
    }

    function select(string $table_name, array $columns, array $condition = [])
    {
        $otherParameter = [];
        foreach ($condition as $key => $value) {
            $otherParameter[] = "{$key} {$value}";
        }
        $otherParameter = join(" ", $otherParameter);
        $columns = join(", ", $columns);
        return "SELECT {$columns} FROM {$table_name} {$otherParameter};";
    }
}