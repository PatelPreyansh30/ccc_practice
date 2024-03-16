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
            $customer = Mage::getModel('customer/customer')->load($customerId);
            $msg = "Welcome " . "<b>" . strtoupper($customer->getFirstName()) . "</b>";
            return "<a href='{$this->getUrl('customer/account/dashboard')}'>" .
                $msg . "</a>" .
                "<a class='logout' href='{$this->getUrl('customer/account/logout')}'>Logout</a>";
        }
        return "<a href='{$this->getUrl('customer/account/login')}'>Login</a>";
    }
    public function getCartCount()
    {
        $item = Mage::getModel('sales/quote')
            ->initQuote()
            ->getItemCollection();
        return count($item) > 0 ? count($item) : 0;
    }
}