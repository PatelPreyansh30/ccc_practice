<?php

class Cart_Block_View extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/view.phtml');
    }
    public function getQuoteItems()
    {
        $quoteId = Mage::getSingleton('core/session')
            ->get('quote_id');

        return Mage::getModel('sales/quote_item')
            ->getCollection()
            ->addFieldToFilter('quote_id', $quoteId)
            ->getData();
        ;
    }
    public function getQuote()
    {
        $quoteId = Mage::getSingleton('core/session')
            ->get('quote_id');
        return Mage::getModel('sales/quote')
            ->load($quoteId);
    }
    public function getDeleteUrl($id)
    {
        return $this->getUrl('sales/quote/delete?item_id=' . $id);
    }
}