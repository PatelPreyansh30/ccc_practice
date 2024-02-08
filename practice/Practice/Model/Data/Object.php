<?php

class Model_Data_Object
{
    private $_row = [];
    public function __construct($row = [])
    {
        $this->_row = $row;
    }
    public function __call($name, $args)
    {
        $name = strtolower(substr($name, 3));
        return isset($this->_row[$name]) ? $this->_row[$name] : "";
    }
}