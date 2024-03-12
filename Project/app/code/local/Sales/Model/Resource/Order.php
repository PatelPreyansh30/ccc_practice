<?php

class Sales_Model_Resource_Order extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('sales_order', 'order_id');
    }
}