<?php

class Cart_Block_Address extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/address/form.phtml');
    }
    public function getCustomerAllAddress()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');
        $customerAddressModel = Mage::getModel('customer/address');
        return $customerAddressModel->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->getData();
    }
    public function getCustomerFirstAddress()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');
        $customerAddressModel = Mage::getModel('customer/address');
        $customerFirstAddress = $customerAddressModel->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->getFirstItem();
        return $customerFirstAddress ? $customerFirstAddress : $customerAddressModel;
    }
    public function getQuoteId()
    {
        return Mage::getSingleton('core/session')
            ->get('quote_id');
    }
    public function getCustomerEmail()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');
        $customerModel = Mage::getModel('customer/customer');
        return $customerModel->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->getFirstItem()
            ->getCustomerEmail();
    }
    public function getCustomerId()
    {
        return Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');
    }
}