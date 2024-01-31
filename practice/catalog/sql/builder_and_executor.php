<?php
include 'connection.php';

class QueryBuilder
{
    private $tablename;

    public function __construct($tablename)
    {
        $this->tablename = $tablename;
    }

    public function insertQuery(array $data)
    {
        $columns = $values = [];
        foreach ($data as $col => $val) {
            $columns[] = "`$col`";
            $values[] = "'" . addslashes($val) . "'";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", $values);
        return "INSERT INTO {$this->tablename} ({$columns}) VALUES ({$values})";
    }

    public function updateQuery(array $data, array $condition)
    {
        $columns = $where_cond = [];
        foreach ($data as $col => $val) {
            $columns[] = "`$col` = '$val'";
        };
        foreach ($condition as $col => $val) {
            $where_cond[] = "`$col` = '$val'";
        };
        $columns = implode(", ", $columns);
        $where_cond = implode(" AND ", $where_cond);
        return "UPDATE {$this->tablename} SET {$columns} WHERE {$where_cond};";
    }

    public function deleteQuery(array $condition)
    {
        $where_cond = [];
        foreach ($condition as $col => $val) {
            $where_cond[] = "`$col` = '$val'";
        };
        $where_cond = implode(" AND ", $where_cond);
        return "DELETE FROM {$this->tablename} WHERE {$where_cond};";
    }

    public function selectQuery(array $columns, array $condition = [])
    {
        $otherParameter = [];
        foreach ($condition as $key => $value) {
            $otherParameter[] = "{$key} {$value}";
        }
        $otherParameter = join(" ", $otherParameter);
        $columns = join(", ", $columns);
        return "SELECT {$columns} FROM {$this->tablename} {$otherParameter};";
    }
}

class QueryExecutor
{
    private $connection, $status;
    private $values = [];

    public function __construct()
    {
        $this->connection = mysqlConnection();
    }

    public function __destruct()
    {
        $this->connection->close();
        $this->status;
    }

    public function selectQueryExecutor(string $query, string $methodType = 'fetch_assoc'): array | null
    {
        $result = $this->connection->query($query);
        if ($methodType == 'fetch_assoc') {
            return $this->fetchAssoc($result);
        } elseif ($methodType == 'fetch_array') {
            return $this->fetchArray($result);
        }
    }

    private function fetchAssoc(mysqli_result | bool $data)
    {
        $result = [];
        while ($row = $data->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

    private function fetchArray(mysqli_result | bool $data)
    {
        $result = [];
        while ($row = $data->fetch_array()) {
            $result[] = $row;
        }
        return $result;
    }

    public function fetchValues(array | null $result, array $parameter)
    {
        if ($result == null) return null;
        for ($i = 0; $i < count($result); $i++) {
            $this->values[$result[$i][$parameter[0]]] = $result[$i][$parameter[1]];
        };
        return $this->values;
    }

    public function otherQueryExecutor(string $query): bool
    {
        $this->status = $this->connection->query($query);
        return $this->status ? true : false;
    }
}

// $builder = new QueryBuilder("ccc_product");
// $executor = new QueryExecutor();

// $query = $builder->selectQuery(["*"]);
// $query = $builder->selectQuery(["*"], ["WHERE " => "product_id = 8"]);

// $query = $builder->deleteQuery(["product_id" => 90]);
// $query = $builder->updateQuery(['product_name' => 'Mohit 2'], ["product_id" => 8]);


// print_r($executor->selectQueryExecutor($query));
