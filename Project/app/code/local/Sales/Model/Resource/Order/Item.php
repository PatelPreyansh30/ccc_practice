<?php

class Sales_Model_Resource_Order_Item extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('sales_order_item', 'item_id');
    }
}