<?php

class Sales_Model_Resource_Order_Shipping extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('sales_order_shipping_method', 'shipping_id');
    }
}