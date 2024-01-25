<?php
include 'connection.php';

$connection = mysqlConnection();

function getParams(string $key)
{
    if ($_POST[$key]) {
        return $_POST[$key];
    } else {
        return $_GET[$key];
    };
};

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

    // global $connection;
    // $execute = mysqli_query($connection, $query);
    // if ($execute) {
    // echo $query;
    // echo "<script>alert('Data added successfully');</script>";
    // } else {
    // echo "Insert operation failed";
    // };
    return $query;
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
    $where_cond = [];
    foreach ($where as $col => $val) {
        $where_cond[] = "`$col` = '$val'";
    };
    $where_cond = implode(" AND ", $where_cond);
    echo "DELETE FROM {$tablename} WHERE {$where_cond};";
};

function select(string $table_name, string $pk, array $columns)
{
    global $connection;
    $columns = join(", ", $columns);
    $query = "SELECT {$columns} FROM `{$table_name}` ORDER BY `{$pk}` DESC";
    // $result = mysqli_query($connection, $query);
    // print_r(mysqli_fetch_array($result));
    // return mysqli_fetch_array($result);
    return $connection->query($query);
};
