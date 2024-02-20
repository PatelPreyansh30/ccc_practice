<?php

class Catalog_Model_Resource_Product
{
    protected $_tableName = '', $_primaryKey = '';
    public function getTableName()
    {
        return $this->_tableName;
    }
    public function init($tableName, $primaryKey)
    {
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;
    }
    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }
    public function load($id, $column = null)
    {
        $query = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey} = {$id} LIMIT 1";
        return $this->getAdapter()->fetchRow($query);
    }
    public function getAdapter()
    {
        return new Core_Model_DB_Adapter();
    }
    public function save(Catalog_Model_Product $product)
    {
        $data = $product->getData();
        if (isset($data[$this->getPrimaryKey()])) {
            unset($data[$this->getPrimaryKey()]);
        }
        $sql = $this->insertSql($this->getTableName(), $data);
        $id = $this->getAdapter()->insert($sql);
        $product->setId($id);
    }
    public function insertSql($tablename, $data)
    {
        $columns = $values = [];
        foreach ($data as $col => $val) {
            $columns[] = "`$col`";
            $values[] = "'" . addslashes($val) . "'";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", $values);
        return "INSERT INTO {$tablename} ({$columns}) VALUES ({$values})";
    }
    // Above part is abstract

    public function __construct()
    {
        $this->init('catalog_product', 'product_id');
    }
}