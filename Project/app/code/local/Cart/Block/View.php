<?php

class Cart_Block_View extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/view.phtml');
    }
    public function getQuoteItems()
    {
        return Mage::getModel('sales/quote')->initQuote()
            ->getItemCollection();
    }
    public function getQuote()
    {
        return Mage::getModel('sales/quote')->initQuote();
    }
    public function getDeleteUrl($id)
    {
        return $this->getUrl('sales/quote/delete?item_id=' . $id);
    }
}