<?php

class Sales_Model_Resource_Quote_Customer extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('sales_quote_customer', 'quote_customer_id');
    }
}