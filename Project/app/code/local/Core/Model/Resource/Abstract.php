<?php

class Core_Model_Resource_Abstract
{
    protected $_tableName = '', $_primaryKey = '';

    public function init($tableName, $primaryKey)
    {
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;
    }

    public function getTableName()
    {
        return $this->_tableName;
    }

    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }

    public function getAdapter()
    {
        return new Core_Model_DB_Adapter();
    }

    public function load($id, $column = null)
    {
        $query = "SELECT * FROM {$this->getTableName()} WHERE {$this->getPrimaryKey()} = {$id} LIMIT 1";
        return $this->getAdapter()->fetchRow($query);
    }

    public function delete(Core_Model_Abstract $abstract)
    {
        $query = "DELETE FROM {$this->getTableName()} WHERE {$this->getPrimaryKey()} = {$abstract->getId()}";
        return $this->getAdapter()->delete($query);
    }

    public function save(Core_Model_Abstract $abstract)
    {
        $data = $abstract->getData();
        if ($data[$this->getPrimaryKey()]) {
            $sql = $this->updateSql($this->getTableName(), $data, $abstract->getId());
            $id = $this->getAdapter()->update($sql);
        } else {
            $sql = $this->insertSql($this->getTableName(), $data);
            $id = $this->getAdapter()->insert($sql);
            $abstract->setId($id);
        }
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

    function updateSql($tablename, $data, $primaryKey)
    {
        $columns = $where_cond = [];
        foreach ($data as $col => $val) {
            $columns[] = "`$col` = '$val'";
        }
        $columns = implode(", ", $columns);
        $where_cond = implode(" AND ", $where_cond);
        return "UPDATE {$tablename} SET {$columns} WHERE {$this->getPrimaryKey()} = {$primaryKey};";
    }
}