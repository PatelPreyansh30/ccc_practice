<?php

class Lib_Sql_Query_Builder extends Lib_Connection
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

    public function select(string $tableName, array $columns, array $condition = [])
    {
        $otherParameter = [];
        foreach ($condition as $key => $value) {
            $otherParameter[] = "{$key} {$value}";
        }
        $otherParameter = join(" ", $otherParameter);
        $columns = join(", ", $columns);
        return "SELECT {$columns} FROM {$tableName} {$otherParameter};";
    }

    public function delete(string $tableName, array $where)
    {
        $whereCond = [];
        foreach ($where as $col => $val) {
            $whereCond[] = "`$col` = '$val'";
        }
        ;
        $whereCond = implode(" AND ", $whereCond);
        return "DELETE FROM {$tableName} WHERE {$whereCond};";
    }

    public function update(string $tableName, array $data, array $where)
    {
        $columns = $whereCond = [];
        foreach ($data as $col => $val) {
            $columns[] = "`$col` = '$val'";
        }
        ;
        foreach ($where as $col => $val) {
            $whereCond[] = "`$col` = '$val'";
        }
        ;
        $columns = implode(", ", $columns);
        $whereCond = implode(" AND ", $whereCond);
        return "UPDATE {$tableName} SET {$columns} WHERE {$whereCond};";
    }
}