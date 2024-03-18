<?php

class Customer_Block_Order_View extends Core_Block_Template
{
    protected $_customerId, $_orderId;
    public function __construct()
    {
        $this->setTemplate('customer/order/view.phtml');

        $this->_customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');
        $this->_orderId = $this->getRequest()->getParams('order_id');
    }
    public function getOrder()
    {
        return Mage::getModel("sales/order")
            ->getCollection()
            ->addFieldToFilter('customer_id', $this->_customerId)
            ->addFieldToFilter('order_id', $this->_orderId)
            ->getFirstItem();
    }
    public function getOrderItems()
    {
        return Mage::getModel("sales/order_item")
            ->getCollection()
            ->addFieldToFilter('order_id', $this->_orderId)
            ->getData();
    }
    public function getOrderAddress()
    {
        return Mage::getModel("sales/order_customer")
            ->getCollection()
            ->addFieldToFilter('customer_id', $this->_customerId)
            ->addFieldToFilter('order_id', $this->_orderId)
            ->getFirstItem();
    }
    public function getOrderPayment()
    {
        return Mage::getModel("sales/order_payment")
            ->getCollection()
            ->addFieldToFilter('order_id', $this->_orderId)
            ->getFirstItem()
            ->getPaymentMethod();
    }
    public function getOrderShipping()
    {
        return Mage::getModel("sales/order_shipping")
            ->getCollection()
            ->addFieldToFilter('order_id', $this->_orderId)
            ->getFirstItem()
            ->getShippingMethod();
    }
}