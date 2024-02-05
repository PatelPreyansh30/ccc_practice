<?php

class Model_DataCollectionObject
{
    protected $_data = [];
    public function addData($row)
    {
        $this->_data[] = new Model_DataObject($row);
    }
    public function getData()
    {
        return $this->_data;
    }
}