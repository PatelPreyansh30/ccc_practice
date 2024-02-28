<?php

class Customer_Model_Account extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Customer_Model_Resource_Account';
        $this->_collectionClass = 'Customer_Model_Resource_Collection_Account';
    }
}