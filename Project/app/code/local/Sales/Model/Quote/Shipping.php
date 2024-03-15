<?php

class Sales_Model_Quote_Shipping extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Shipping';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Shipping';
    }
    public function addShippingMethod(Sales_Model_Quote $quote, $shippingMethodData)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();
        $this->setData(
            $shippingMethodData
        );
        if ($item) {
            $this->setId($item->getId());
        }
        $this->addData('quote_id', $quote->getId());
        $this->save();
        return $this;
    }
}