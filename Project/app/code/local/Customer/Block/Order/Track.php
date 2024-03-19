<?php

class Customer_Block_Order_Track extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/order/track.phtml');
    }
    public function getOrderStatus()
    {
        $orderNumber = $this->getRequest()->getParams('order_number');

        return $orderNumber ? Mage::getModel("sales/order")
            ->getCollection()
            ->addFieldToFilter('order_number', $orderNumber)
            ->getFirstItem()
            ->getStatus() :
            false;
    }
}