<?php

class Model_Product extends Model_Abstract
{
    private $__table_name = 'ccc_product';

    public function __construct()
    {
    }

    public function save($data)
    {
        $query = $this->getQueryBuilder()->insert($this->__table_name, $data);
        return $this->getQueryBuilder()->execute($query);
    }

    public function delete(array $where_condition)
    {
        $query = $this->getQueryBuilder()->delete($this->__table_name, $where_condition);
        return $this->getQueryBuilder()->execute($query);
    }

    public function update(array $data, array $where_condition)
    {
        $query = $this->getQueryBuilder()->update($this->__table_name, $data, $where_condition);
        return $this->getQueryBuilder()->execute($query);
    }
    public function fetchOne(array $data, array $where_condition)
    {
        $query = $this->getQueryBuilder()->select($this->__table_name, $data, $where_condition);
        $result = $this->getQueryBuilder()->execute($query);
        return $this->getQueryExecutor()->fetchAssoc($result);
    }

    public function fetch(array $columns, array $condition = [])
    {
        $query = $this->getQueryBuilder()->select($this->__table_name, $columns, $condition = []);
        $result = $this->getQueryBuilder()->execute($query);
        return $this->getQueryExecutor()->fetchAssoc($result);
    }


}