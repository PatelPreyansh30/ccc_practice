<?php

class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    protected $_notAllowedAction = ['saveAddress','placeOrder'];
    public function addAction()
    {
        $quoteData = $this->getRequest()
            ->getParams('sales_quote');
        $this->checkDataIsNull([$quoteData], '');

        Mage::getSingleton("sales/quote")
            ->addProduct($quoteData);
        $this->setRedirect('cart');
    }
    public function deleteAction()
    {
        $quoteItemId = $this->getRequest()->getParams('item_id');
        $this->checkDataIsNull([$quoteItemId], '');

        Mage::getSingleton("sales/quote")
            ->deleteProduct($quoteItemId);
        $this->setRedirect('cart');
    }
    public function saveAddressAction()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $this->checkDataIsNull([$quoteId], '');

        $quoteModel = Mage::getModel('sales/quote');

        $customerAddressData = $this->getRequest()
            ->getParams('customer_address');
        $quoteModel->addAddress($customerAddressData);
        $this->setRedirect('cart/checkout/method');
    }
    public function placeOrderAction()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $this->checkDataIsNull([$quoteId], '');

        $quoteModel = Mage::getModel('sales/quote');

        $paymentMethodData = $this->getRequest()
            ->getParams('quote_payment_method');
        $shippingMethodData = $this->getRequest()
            ->getParams('quote_shipping_method');
        $this->checkDataIsNull(
            [$paymentMethodData, $shippingMethodData],
            'cart/checkout/method'
        );

        $quoteModel->addPayment($paymentMethodData);
        $quoteModel->addShipping($shippingMethodData);

        $quoteModel->convert();

        Mage::getSingleton('core/session')->remove('quote_id');
        $this->setRedirect('cart/checkout/success');
    }
}