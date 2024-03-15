<?php

class Sales_Model_Quote_Payment extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Payment';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Payment';
    }
    public function addPaymentMethod(Sales_Model_Quote $quote, $paymentMethodData)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();
        $this->setData(
            $paymentMethodData
        );
        if ($item) {
            $this->setId($item->getId());
        }
        $this->addData('quote_id', $quote->getId());
        $this->save();
        return $this;
    }
}