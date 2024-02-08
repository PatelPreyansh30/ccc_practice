<?php

class Model_Product extends Model_Abstract
{
    private $__tableName = 'ccc_product';

    public function __construct()
    {
    }

    public function save($data)
    {
        $query = $this->getQueryBuilder()->insert($this->__tableName, $data);
        return $this->getQueryBuilder()->execute($query);
    }

    public function delete(array $whereCondition)
    {
        $query = $this->getQueryBuilder()->delete($this->__tableName, $whereCondition);
        return $this->getQueryBuilder()->execute($query);
    }

    public function update(array $data, array $whereCondition)
    {
        $query = $this->getQueryBuilder()->update($this->__tableName, $data, $whereCondition);
        return $this->getQueryBuilder()->execute($query);
    }
    public function fetchOne(array $data, array $whereCondition)
    {
        $query = $this->getQueryBuilder()->select($this->__tableName, $data, $whereCondition);
        $result = $this->getQueryBuilder()->execute($query);
        return $this->getQueryExecutor()->fetchAssoc($result);
    }

    public function fetch(array $columns, array $condition = [])
    {
        $query = $this->getQueryBuilder()->select($this->__tableName, $columns, $condition = []);
        $result = $this->getQueryBuilder()->execute($query);
        return $this->getQueryExecutor()->fetchAssoc($result);
    }


}