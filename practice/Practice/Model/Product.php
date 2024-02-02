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
        $this->getQueryBuilder()->execute($query);
    }

    public function fetch(array $columns, array $condition = [])
    {
        $query = $this->getQueryBuilder()->select($this->__table_name, $columns, $condition = []);
        $result = $this->getQueryBuilder()->execute($query);
        return $this->getQueryExecutor()->fetchAssoc($result);
    }
}