<?php

class Sales_Model_Order_Payment extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Payment';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Payment';
    }
    public function addPayment(Sales_Model_Order $order, $quotePayment)
    {
        $this->setData($quotePayment)
            ->removeData('payment_id')
            ->removeData('quote_id')
            ->addData('order_id', $order->getId())
            ->save();
        return $this;
    }
}