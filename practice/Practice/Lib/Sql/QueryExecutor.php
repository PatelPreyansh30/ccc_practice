<?php

class Lib_Sql_QueryExecutor extends Lib_Connection{
    public function __construct(){}

    public function fetchAssoc(mysqli_result|bool $data)
    {
        $result = [];
        while ($row = $data->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

    public function fetchArray(mysqli_result|bool $data)
    {
        $result = [];
        while ($row = $data->fetch_array()) {
            $result[] = $row;
        }
        return $result;
    }
}