<?php

function mysqlConnection()
{
    $connection = mysqli_connect("localhost", "root", "", "ccc_practice");

    if ($connection->connect_errno) {
        die("Connection error: $connection->connect_errno");
    } else {
        return $connection;
    };
};

$connection = mysqlConnection();

function insert(string $table_name, array $data)
{
    $columns = $values = [];
    foreach ($data as $col => $val) {
        $columns[] = "`$col`";
        $values[] = "'" . addslashes($val) . "'";
    }
    $columns = implode(", ", $columns);
    $values = implode(", ", $values);

    $query = "INSERT INTO {$table_name} ({$columns}) VALUES ({$values})";

    global $connection;
    $execute = mysqli_query($connection, $query);
    if ($execute) {
        echo $query;
        echo "<script>alert('Data added successfully');</script>";
    } else {
        echo "Insert operation failed";
    };
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
    echo "UPDATE {$tablename} SET {$columns} WHERE {$where_cond};";
};

function delete(string $tablename, array $where)
{
    $where_cond = [];
    foreach ($where as $col => $val) {
        $where_cond[] = "`$col` = '$val'";
    };
    $where_cond = implode(" AND ", $where_cond);
    echo "DELETE FROM {$tablename} WHERE {$where_cond};";
};

function select(string $table_name, array $columns, int $limit)
{
    global $connection;
    $query = "SELECT * FROM `{$table_name}` ORDER BY `index` DESC LIMIT {$limit};";
    return $connection->query($query);
};
