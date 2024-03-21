<?php

class Sales_Model_Order_Status_History extends Core_Model_Abstract
{
    const DEFAULT_IS_REQUESTED = 0;
    const DEFAULT_IS_APPROVED = 0;
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Status_History';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Status_History';
    }
}