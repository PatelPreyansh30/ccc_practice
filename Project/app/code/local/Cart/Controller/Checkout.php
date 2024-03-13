<?php

class Cart_Controller_Checkout extends Core_Controller_Front_Action
{
    protected $_allowedAction = [];
    public function indexAction()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');

        if ($quoteId) {
            $layout = $this->getLayout();
            $layout->getChild('head')
                ->addCss('customer/address/form.css')
                ->addJs('customer/address/form.js');
            $content = $layout->getChild('content');

            $addressForm = Mage::getBlock('customer/address');
            $content->addChild('form', $addressForm);

            $layout->toHtml();
        } else {
            $this->setRedirect('page');
        }
    }
}