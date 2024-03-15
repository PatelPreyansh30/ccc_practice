<?php

class Sales_Model_Order_Customer extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Customer';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Customer';
    }
    public function addCustomer(Sales_Model_Order $order, $quoteCustomer)
    {
        $this->setData($quoteCustomer)
            ->removeData('quote_customer_id')
            ->removeData('quote_id')
            ->addData('order_id', $order->getId())
            ->save();
        return $this;
    }
}