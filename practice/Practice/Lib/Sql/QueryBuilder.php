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

    public function select(string $table_name, array $columns, array $condition = [])
    {
        $otherParameter = [];
        foreach ($condition as $key => $value) {
            $otherParameter[] = "{$key} {$value}";
        }
        $otherParameter = join(" ", $otherParameter);
        $columns = join(", ", $columns);
        return "SELECT {$columns} FROM {$table_name} {$otherParameter};";
    }

    public function delete(string $tablename, array $where)
    {
        $where_cond = [];
        foreach ($where as $col => $val) {
            $where_cond[] = "`$col` = '$val'";
        }
        ;
        $where_cond = implode(" AND ", $where_cond);
        return "DELETE FROM {$tablename} WHERE {$where_cond};";
    }

    public function update(string $tablename, array $data, array $where)
    {
        $columns = $where_cond = [];
        foreach ($data as $col => $val) {
            $columns[] = "`$col` = '$val'";
        }
        ;
        foreach ($where as $col => $val) {
            $where_cond[] = "`$col` = '$val'";
        }
        ;
        $columns = implode(", ", $columns);
        $where_cond = implode(" AND ", $where_cond);
        return "UPDATE {$tablename} SET {$columns} WHERE {$where_cond};";
    }
}