<?php

class Order_Block_Admin_List extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('order/admin/list.phtml');
    }
    public function getAllOrders()
    {
        return Mage::getModel('sales/order')
            ->getCollection()
            ->getData();
    }
    public function getCustomerName($customerId)
    {
        $customer = Mage::getModel('customer/customer')->load($customerId, 'customer_id');
        return "{$customer->getFirstName()} {$customer->getLastName()}";
    }
}