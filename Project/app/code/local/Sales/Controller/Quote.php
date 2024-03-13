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
            echo "<pre>";
            print_r($customerAddressData);
            $quoteModel->addAddress($customerAddressData);
        } else {
            $this->setRedirect('page');
        }
    }
}