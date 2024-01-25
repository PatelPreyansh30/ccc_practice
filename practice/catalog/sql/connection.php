<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "ccc_practice";

function mysqlConnection()
{
    global $server, $username, $password, $database;
    $connection = mysqli_connect($server, $username, $password, $database);
    if ($connection->connect_error) {
        die("Connection error: $connection->connect_error");
    };
    return $connection;
};
