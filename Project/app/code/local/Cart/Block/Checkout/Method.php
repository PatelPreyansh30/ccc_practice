<?php

class Cart_Block_Checkout_Method extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/checkout/method.phtml');
    }
    public function getPaymentMethods()
    {
        return [
            'card' => 'Credit or Debit Card',
            'digital_wallet' => 'Digital Wallet',
            'upi' => 'UPI',
            'net_banking' => 'Net Banking',
            'cod' => 'Cash On Delivery'
        ];
    }
    public function getShippingMethods()
    {
        return [
            'normal_day' => 'Normal Day Shipping',
            'same_day' => 'Same Day Shipping',
            'international' => 'International Shipping'
        ];
    }
    public function getQuoteId()
    {
        return Mage::getSingleton('core/session')->get('quote_id');
    }
}