<?php

class Sales_Model_Resource_Order_Payment extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('sales_order_payment_method', 'payment_id');
    }
}