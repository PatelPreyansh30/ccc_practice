<?php

class Model_Data_Collection_Object
{
    protected $_data = [];
    public function addData($row)
    {
        $this->_data[] = new Model_Data_Object($row);
    }
    public function getData()
    {
        return $this->_data;
    }
}