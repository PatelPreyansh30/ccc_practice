<?php

class Order_Block_Admin_View extends Core_Block_Template
{
    protected $_orderId;
    public function __construct()
    {
        $this->setTemplate('order/admin/view.phtml');
        $this->_orderId = $this->getRequest()->getParams('order_id');
    }
    public function getOrder()
    {
        return Mage::getModel("sales/order")
            ->getCollection()
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
    public function getStatus()
    {
        return [
            'pending'=>'Pending', 
            'shipped'=>'Shipped', 
            'cancelled'=>'Cancelled', 
            'declined'=>'Declined', 
            'refunded'=>'Refunded', 
            'completed'=>'Completed'
        ];
    }
}