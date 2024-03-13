<?php

class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function addAction()
    {
        $quoteData = $this->getRequest()
            ->getParams('sales_quote');
        Mage::getSingleton("sales/quote")
            ->addProduct($quoteData);
        $this->setRedirect('cart');
    }
    public function deleteAction()
    {
        Mage::getSingleton("sales/quote")
            ->deleteProduct(
                $this->getRequest()
                    ->getParams('item_id')
            );
        $this->setRedirect('cart');
    }
    public function saveAddressAction()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');

        if ($quoteId) {
            $quoteModel = Mage::getModel('sales/quote');

            $customerAddressData = $this->getRequest()
                ->getParams('customer_address');
            $quoteModel->addAddress($customerAddressData);
            $this->setRedirect('cart/checkout/method');
        } else {
            $this->setRedirect('page');
        }
    }
    public function placeOrderAction()
    {
        $paymentMethodData = $this->getRequest()
            ->getParams('quote_payment_method');
        $shippingMethodData = $this->getRequest()
            ->getParams('quote_shipping_method');

        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $quoteModel = Mage::getModel('sales/quote')->load($quoteId);

        $paymentMethodModel = Mage::getModel('sales/quote_payment');
        $shippingMethodModel = Mage::getModel('sales/quote_shipping');

        $paymentMethodId = $paymentMethodModel->setData($paymentMethodData)
            ->save()
            ->getId();
        $shippingMethodId = $shippingMethodModel->setData($shippingMethodData)
            ->save()
            ->getId();

        $quoteModel->addData('payment_id', $paymentMethodId)
            ->addData('shipping_id', $shippingMethodId)
            ->removeData('order_id')
            ->save();

        $quoteModel->convert();
    }
}