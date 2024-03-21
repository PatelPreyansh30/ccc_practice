<?php

class Sales_Model_Order extends Core_Model_Abstract
{
    const INITIAL_ORDER_NUMBER = 1000000;
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order';
    }
    public function _beforeSave()
    {
        if (empty ($this->getId())) {
            $orderItem = $this->getCollection()
                ->addOrderBy('order_number', 'DESC')
                ->getFirstItem();
            if (is_null($orderItem)) {
                $this->addData('order_number', self::INITIAL_ORDER_NUMBER);
            } else {
                $this->addData('order_number', (int) $orderItem->getOrderNumber() + 1);
            }
        }
    }
    public function addOrder($order)
    {
        $this->setData($order)
            ->removeData('quote_id')
            ->removeData('order_id')
            ->removeData('payment_id')
            ->removeData('shipping_id')
            ->save();
        return $this;
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