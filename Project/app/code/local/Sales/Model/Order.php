<?php

class Sales_Model_Order extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order';
    }
    public function _beforeSave()
    {
        $orderNumber = rand(1000000, 9999999);

        $flag = True;
        while ($flag) {
            $existOrderNumber = Mage::getModel('sales/order')
                ->getCollection()
                ->addFieldToFilter('order_number', $orderNumber)
                ->getFirstItem();
            if (!$existOrderNumber) {
                $flag = False;
            }
            $orderNumber = rand(1000000, 9999999);
        }
        $this->addData('order_number', $orderNumber);
    }
    public function addOrderItem($quoteItem)
    {
        if ($this->getId()) {
            Mage::getModel('sales/order_item')
                ->addItem($this, $quoteItem);
        }
    }
    public function addOrderCustomer($quoteCustomer)
    {
        if ($this->getId()) {
            Mage::getModel('sales/order_customer')
                ->addCustomer($this, $quoteCustomer);
        }
    }
    public function addOrderPayment($quotePayment)
    {
        if ($this->getId()) {
            $id = Mage::getModel('sales/order_payment')
                ->addPayment($this, $quotePayment)
                ->getId();
            $this->addData('payment_id', $id)->save();
        }
    }
    public function addOrderShipping($quoteShipping)
    {
        if ($this->getId()) {
            $id = Mage::getModel('sales/order_shipping')
                ->addShipping($this, $quoteShipping)
                ->getId();
            $this->addData('shipping_id', $id)->save();
        }
    }
}