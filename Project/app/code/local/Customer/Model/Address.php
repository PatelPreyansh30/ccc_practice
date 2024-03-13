<?php

class Customer_Model_Address extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Customer_Model_Resource_Address';
        $this->_collectionClass = 'Customer_Model_Resource_Collection_Address';
    }
}