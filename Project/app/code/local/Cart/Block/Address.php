<?php

class Cart_Block_Address extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/address/form.phtml');
    }
    public function getCustomerAddress()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');

        return Mage::getModel('customer/customer')->load($customerId);
    }
    public function getQuoteId()
    {
        return Mage::getSingleton('core/session')->get('quote_id');
    }
}