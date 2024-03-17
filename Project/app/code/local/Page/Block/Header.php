<?php

class Page_Block_Header extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('page/header.phtml');
    }
    public function getUser()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');
        if ($customerId) {
            $firstName = Mage::getModel('customer/customer')
                ->load($customerId)
                ->getFirstName();
            return "Welcome " . "<b>" . strtoupper($firstName) . "</b>";
        }
        return null;
    }
    public function getCartCount()
    {
        $item = Mage::getModel('sales/quote')
            ->initQuote()
            ->getItemCollection();
        return count($item) > 0 ? count($item) : 0;
    }
}