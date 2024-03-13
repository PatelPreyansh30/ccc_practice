<?php

class Sales_Model_Resource_Quote_Payment extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('sales_quote_payment_method', 'payment_id');
    }
}