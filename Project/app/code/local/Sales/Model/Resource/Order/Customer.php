<?php

class Sales_Model_Resource_Order_Customer extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('sales_order_customer', 'order_customer_id');
    }
}