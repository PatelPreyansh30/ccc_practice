<?php

class Order_Block_Admin_Cancel extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('order/admin/cancel.phtml');
    }
    public function getOrder($orderId)
    {
        return Mage::getModel('sales/order')
            ->load($orderId);
    }
    public function getCancelRequestedOrder()
    {
        return Mage::getModel('sales/order_status_history')
            ->getCollection()
            ->addFieldToFilter('is_requested', 1)
            ->getData();
    }
    public function getCustomerName($customerId)
    {
        $customer = Mage::getModel('customer/customer')->load($customerId, 'customer_id');
        return "{$customer->getFirstName()} {$customer->getLastName()}";
    }
}