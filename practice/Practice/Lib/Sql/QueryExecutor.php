<?php

class Lib_Sql_QueryExecutor extends Lib_Connection
{
    public function __construct()
    {
    }

    public function fetchAssoc(mysqli_result|bool $data)
    {
        // $result = [];
        $data_collection = new Model_DataCollectionObject();
        while ($row = $data->fetch_assoc()) {
            $data_collection->addData($row);
        }
        // print_r($data_collection->getData());
        // return $result;
        return count($data_collection->getData()) > 1 ? $data_collection->getData() : $data_collection->getData()[0];
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