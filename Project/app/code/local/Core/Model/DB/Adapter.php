<?php

class Core_Model_DB_Adapter
{
    public $config = [
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'db' => 'ccc_practice',
    ];
    public $connect = null;
    public function connect()
    {
        if (is_null($this->connect)) {
            $this->connect = mysqli_connect(
                $this->config['host'],
                $this->config['user'],
                $this->config['password'],
                $this->config['db']
            );
        }
        return $this->connect;
    }
    public function fetchAll($query)
    {
        $row = [];
        $result = mysqli_query($this->connect(), $query);
        while ($_row = $result->fetch_assoc()) {
            $row[] = $_row;
        }
        return $row;
    }
    public function fetchPairs($query)
    {
    }
    public function fetchOne($query)
    {
    }
    public function fetchRow($query)
    {
        $row = [];
        $result = mysqli_query($this->connect(), $query);
        while ($_row = $result->fetch_assoc()) {
            $row = $_row;
        }
        return $row;
    }
    public function insert($query)
    {
        $result = mysqli_query($this->connect(), $query);
        while ($result) {
            return mysqli_insert_id($this->connect());
        }
        return False;
    }
    public function update($query)
    {
        return mysqli_query($this->connect(), $query);
    }
    public function delete($query)
    {
        return mysqli_query($this->connect(), $query);
    }
    public function query($query)
    {
    }

}