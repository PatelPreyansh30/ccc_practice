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
            $session = Mage::getSingleton('core/session');
            $quoteCustomerModel = Mage::getModel('sales/quote_customer');

            $customerAddressData = $this->getRequest()
                ->getParams('customer_address');
            $quoteCustomerModel->setData($customerAddressData);

            $quoteCustomerId = $session->get('quote_customer_id');
            if ($quoteCustomerId) {
                $quoteCustomerModel->addData('quote_customer_id', $quoteCustomerId);
                $quoteCustomerModel->save();
            } else {
                $id = $quoteCustomerModel->save()->getId();
                $session->set('quote_customer_id', $id);
            }
        } else {
            $this->setRedirect('page');
        }
    }
}