<?php
include 'connection.php';

$connection = mysqlConnection();

function getParams(string $key)
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    } elseif (isset($_GET[$key])) {
        return $_GET[$key];
    };
};

function insert(string $table_name, array $data)
{
    global $connection;

    $columns = $values = [];
    foreach ($data as $col => $val) {
        $columns[] = "`$col`";
        $values[] = "'" . addslashes($val) . "'";
    }
    $columns = implode(", ", $columns);
    $values = implode(", ", $values);
    $query = "INSERT INTO {$table_name} ({$columns}) VALUES ({$values})";

    return $connection->query($query);
}

function update(string $tablename, array $where, array $data)
{
    $columns = $where_cond = [];
    foreach ($data as $col => $val) {
        $columns[] = "`$col` = '$val'";
    };
    foreach ($where as $col => $val) {
        $where_cond[] = "`$col` = '$val'";
    };
    $columns = implode(", ", $columns);
    $where_cond = implode(" AND ", $where_cond);
    $query = "UPDATE {$tablename} SET {$columns} WHERE {$where_cond};";
    return $query;
};

function delete(string $tablename, array $where)
{
    global $connection;
    $where_cond = [];
    foreach ($where as $col => $val) {
        $where_cond[] = "`$col` = '$val'";
    };
    $where_cond = implode(" AND ", $where_cond);
    $query = "DELETE FROM {$tablename} WHERE {$where_cond};";
    return $connection->query($query);
};

function select(string $table_name, string $pk, array $columns)
{
    global $connection;
    $columns = join(", ", $columns);
    $query = "SELECT {$columns} FROM `{$table_name}` ORDER BY `{$pk}`";
    return $connection->query($query);
};
