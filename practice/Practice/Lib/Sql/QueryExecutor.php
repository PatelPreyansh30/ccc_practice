<?php

class Lib_Sql_QueryExecutor extends Lib_Connection
{
    public function __construct()
    {
    }

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

    public function fetchValues(mysqli_result|null $result, array $parameter)
    {
        $values = [];
        if ($result->num_rows <= 0)
            return null;
        while ($row = $result->fetch_assoc()) {
            $values[$row[$parameter[0]]] = $row[$parameter[1]];
        }
        return $values;
    }
}