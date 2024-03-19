<?php

class Sales_Model_Resource_Order_Status_History extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('sales_order_status_history', 'history_id');
    }
}