<?php

class Sales_Model_Order_Customer extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Customer';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Customer';
    }
}