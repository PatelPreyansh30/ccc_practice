<?php

class Cart_Block_Checkout_Success extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/checkout/success.phtml');
    }
    public function getLastOrder()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');
        return Mage::getModel('sales/order')
            ->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->addOrderBy('order_id', 'DESC')
            ->getFirstItem();
    }
}