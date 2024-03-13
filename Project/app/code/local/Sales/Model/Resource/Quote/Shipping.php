<?php

class Sales_Model_Resource_Quote_Shipping extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('sales_quote_shipping_method', 'shipping_id');
    }
}