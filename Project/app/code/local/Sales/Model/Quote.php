<?php

class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote';
    }
    public function initQuote()
    {
        $sessionModel = Mage::getSingleton('core/session');
        $quoteId = $sessionModel->get('quote_id');
        $customerId = $sessionModel->get('logged_in_customer_id');

        if (!$quoteId) {
            $quote = Mage::getModel('sales/quote')
                ->setData(['tax_percent' => 0, 'grand_total' => 0]);
            $quote->save();

            if ($customerId) {
                $existingQuote = Mage::getModel('sales/quote')
                    ->getCollection()
                    ->addFieldToFilter('quote_id', $quote->getId())
                    ->addFieldToFilter('customer_id', $customerId)
                    ->getFirstItem();
                if ($existingQuote) {
                    $quote->addData('quote_id', $existingQuote->getId());
                }
                $quote->addData('customer_id', $customerId);
            }

            $quote->save();
            Mage::getSingleton('core/session')
                ->set('quote_id', $quote->getId());
            $quoteId = $quote->getId();
        }
        $this->load($quoteId);
        return $this;
    }
    public function getItemCollection()
    {
        return Mage::getModel('sales/quote_item')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getData();
    }
    public function getCustomer()
    {
        return Mage::getModel('sales/quote_customer')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getFirstItem();
    }
    public function getPaymentMethod()
    {
        return Mage::getModel('sales/quote_payment')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getFirstItem();
    }
    public function getShippingMethod()
    {
        return Mage::getModel('sales/quote_shipping')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getFirstItem();
    }
    protected function _beforeSave()
    {
        $grandTotal = 0;
        foreach ($this->getItemCollection() as $item) {
            $grandTotal += $item->getRowTotal();
        }
        if ($this->getTaxPercent()) {
            $tax = round($grandTotal / $this->getTaxPercent(), 2);
            $grandTotal += $tax;
        }
        $this->addData('grand_total', $grandTotal);
    }
    public function addProduct($quoteData)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel('sales/quote_item')
                ->addItem(
                    $this,
                    $quoteData['product_id'],
                    $quoteData['qty'],
                    isset ($quoteData['item_id'])
                    ? $quoteData['item_id']
                    : null
                );
        }
        $this->removeData('order_id')
            ->removeData('payment_id')
            ->removeData('customer_id')
            ->removeData('shipping_id');
        $this->save();
    }
    public function deleteProduct($itemId)
    {
        $this->initQuote();

        if ($this->getId()) {
            Mage::getModel('sales/quote_item')->deleteItem($this, $itemId);
        }
        $this->removeData('order_id')
            ->removeData('payment_id')
            ->removeData('customer_id')
            ->removeData('shipping_id');
        $this->save();
    }
    public function addAddress($address)
    {
        $this->initQuote();
        $session = Mage::getSingleton('core/session');
        $quoteCustomerId = $session->get('quote_customer_id');

        $quoteCustomerModel = Mage::getModel('sales/quote_customer');
        $quoteCustomerModel->setData($address);

        if ($quoteCustomerId) {
            $quoteCustomerModel->addData('quote_customer_id', $quoteCustomerId);
            $quoteCustomerModel->save();
        } else {
            $id = $quoteCustomerModel->save()->getId();
            $session->set('quote_customer_id', $id);
        }
        $this->addData('customer_id', $address['customer_id'])
            ->removeData('order_id')
            ->removeData('payment_id')
            ->removeData('shipping_id')
            ->save();
    }
    public function addPayment($paymentMethodData)
    {
        $this->initQuote();
        if ($this->getId()) {
            $id = Mage::getModel("sales/quote_payment")
                ->addPaymentMethod($this, $paymentMethodData)
                ->getId();
            $this->addData('payment_id', $id);
        }
        $this->removeData('order_id');
        $this->removeData('shipping_id');
        $this->save();
    }
    public function addShipping($shippingMethodData)
    {
        $this->initQuote();
        if ($this->getId()) {
            $id = Mage::getModel("sales/quote_shipping")
                ->addShippingMethod($this, $shippingMethodData)
                ->getId();
            $this->addData('shipping_id', $id);
        }
        $this->removeData('order_id');
        $this->save();
    }
    public function convert()
    {
        if ($this->getId()) {
            $orderModel = Mage::getModel('sales/order');
            $orderId = $orderModel->addOrder($this->getData())->getId();

            foreach ($this->getItemCollection() as $item) {
                $orderModel->addOrderItem($item->getData());
            }
            if ($this->getCustomer()) {
                $orderModel->addOrderCustomer($this->getCustomer()->getData());
            }
            if ($this->getPaymentMethod()) {
                $orderModel->addOrderPayment($this->getPaymentMethod()->getData());
            }
            if ($this->getShippingMethod()) {
                $orderModel->addOrderShipping($this->getShippingMethod()->getData());
            }

            $this->addData('order_id', $orderId)
                ->save();
        }
    }
}