<?php

class Sales_Model_Order_Shipping extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Shipping';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Shipping';
    }
    public function addShipping(Sales_Model_Order $order, $quoteShipping)
    {
        $this->setData($quoteShipping)
            ->removeData('shipping_id')
            ->removeData('quote_id')
            ->addData('order_id', $order->getId())
            ->save();
        return $this;
    }
}