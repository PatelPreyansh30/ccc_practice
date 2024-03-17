<?php

class Customer_Block_Quote_Address extends Core_Block_Template
{
  public function __construct()
  {
    $this->setTemplate('customer/address/quote/form.phtml');
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
  public function getRegions()
  {
    return [
      1 => 'Asia',
      2 => 'Africa',
      3 => 'North America',
      4 => 'South America',
      5 => 'Europe'
    ];
  }
  public function getCountry()
  {
    return '
        {
  "1": {
    "1": "India",
    "2": "China",
    "3": "Japan",
    "4": "South Korea",
    "5": "Indonesia",
    "6": "UAE",
    "7": "Israel"
  },
  "2": {
    "1": "Ethiopia",
    "2": "Egypt",
    "3": "Morocco",
    "4": "South Africa",
    "5": "Nigeria",
    "6": "Congo",
    "7": "Mauritius"
  },
  "3": {
    "1": "United States",
    "2": "Canada",
    "3": "Mexico"
  },
  "4": {
    "1": "Brazil",
    "2": "Peru",
    "3": "Ecuador",
    "4": "Chile",
    "5": "Argentina",
    "6": "Venezuela",
    "7": "Colombia"
  },
  "5": {
    "1": "United Kingdom",
    "2": "Spain",
    "3": "France",
    "4": "Sweden",
    "5": "Finland",
    "6": "Greece",
    "7": "Italy"
  }
}
';
  }
}