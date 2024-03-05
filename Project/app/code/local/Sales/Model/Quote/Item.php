<?php

class Sales_Model_Quote_Item extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Item';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Item';
    }
    public function getProduct()
    {
        return Mage::getModel('catalog/product')->load($this->getProductId());
    }
    protected function _beforeSave()
    {
        if ($this->getProductId()) {
            $price = $this->getProduct()->getPrice();
            $this->addData('price', $price);
            $this->addData('row_total', $price * $this->getQty());
        }
    }
    public function addItem(Sales_Model_Quote $quote, $product_id, $qty)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('product_id', $product_id)
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();

        if ($item) {
            $qty += $item->getQty();
        }
        $this->setData([
            'product_id' => $product_id,
            'quote_id' => $quote->getId(),
            'qty' => $qty
        ]);
        if ($item) {
            $this->setId($item->getId());
        }
        $this->save();
    }
}