<?php

class Customer_Model_Customer extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Customer_Model_Resource_Customer';
        $this->_collectionClass = 'Customer_Model_Resource_Collection_Customer';
    }
}