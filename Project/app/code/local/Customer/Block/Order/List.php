<?php

class Customer_Block_Order_List extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/order/list.phtml');
    }
    public function getOrderList()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');
        return Mage::getModel("sales/order")
            ->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->getData();
    }
}