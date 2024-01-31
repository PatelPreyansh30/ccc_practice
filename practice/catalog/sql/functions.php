<?php
// include 'connection.php';

// function queryExecutor(string $query)
// {
//     $connection = mysqlConnection();
//     return $connection->query($query);
// }

// function insertQuery(string $table_name, array $data)
// {
//     $columns = $values = [];
//     foreach ($data as $col => $val) {
//         $columns[] = "`$col`";
//         $values[] = "'" . addslashes($val) . "'";
//     }
//     $columns = implode(", ", $columns);
//     $values = implode(", ", $values);
//     return "INSERT INTO {$table_name} ({$columns}) VALUES ({$values})";
// }

// function updateQuery(string $tablename, array $where, array $data)
// {
//     $columns = $where_cond = [];
//     foreach ($data as $col => $val) {
//         $columns[] = "`$col` = '$val'";
//     };
//     foreach ($where as $col => $val) {
//         $where_cond[] = "`$col` = '$val'";
//     };
//     $columns = implode(", ", $columns);
//     $where_cond = implode(" AND ", $where_cond);
//     return "UPDATE {$tablename} SET {$columns} WHERE {$where_cond};";
// };

// function deleteQuery(string $tablename, array $where)
// {
//     $where_cond = [];
//     foreach ($where as $col => $val) {
//         $where_cond[] = "`$col` = '$val'";
//     };
//     $where_cond = implode(" AND ", $where_cond);
//     return "DELETE FROM {$tablename} WHERE {$where_cond};";
// };

// function selectQuery(string $table_name, array $columns, array $condition = [])
// {
//     $otherParameter = [];
//     foreach ($condition as $key => $value) {
//         $otherParameter[] = "{$key} {$value}";
//     }
//     $otherParameter = join(" ", $otherParameter);
//     $columns = join(", ", $columns);
//     return "SELECT {$columns} FROM {$table_name} {$otherParameter};";
// }

function getParams(string $key)
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    } elseif (isset($_GET[$key])) {
        return $_GET[$key];
    };
};

// function getKeysFromPostRequest()
// {
//     $keys = [];
//     foreach ($_POST as $key => $val) {
//         if (is_array($val)) {
//             $keys[] = $key;
//         };
//     };
//     return $keys;
// };
