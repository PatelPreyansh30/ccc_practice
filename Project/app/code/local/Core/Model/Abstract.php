<?php

class Core_Model_Abstract
{
    protected $data = [];
    protected $resourceClass = '';
    protected $collectionClass = '';
    protected $resource = null;
    protected $collection = null;
    public function __construct()
    {
    }
    public function setResourceClass($resourceClass)
    {
    }
    public function setCollectionClass($collectionClass)
    {
    }
    public function setId($id)
    {
    }
    public function getId()
    {
    }
    public function getResource()
    {
        $modelClass = get_class($this);
        // $class = substr($modelClass, 0, strpos($modelClass, '_Model_') + 6) . '_Resource_' . substr($modelClass, strpos($modelClass, '_Model_') + 7);
        $class = str_replace('_Model_','_Model_Resource_',$modelClass);
        return new $class();
    }
    public function getCollection()
    {
    }
    public function getPrimaryKey()
    {
    }
    public function getTableName()
    {
    }
    public function __set($key, $value)
    {
    }
    public function __get($key)
    {
    }
    public function __unset($key)
    {
    }
    public function getData($key = null)
    {
    }
    public function setData($data)
    {
    }
    public function addData($key, $value)
    {
    }
    public function removeData($key = null)
    {
    }
    public function save()
    {
    }
    public function load($id, $column = null)
    {
        print_r($this->getResource());
    }
    public function delete()
    {
    }

}