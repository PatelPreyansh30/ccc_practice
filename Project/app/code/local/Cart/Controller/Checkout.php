<?php

class Cart_Controller_Checkout extends Core_Controller_Front_Action
{
    protected $_notAllowedAction = ['index', 'method', 'success'];
    public function indexAction()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $this->checkDataIsNull([$quoteId], '');

        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('customer/address/form.css')
            ->addJs('customer/address/form.js');
        $content = $layout->getChild('content');

        $addressForm = Mage::getBlock('customer/address');
        $content->addChild('form', $addressForm);

        $layout->toHtml();
    }
    public function methodAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('cart/checkout/method.css');
        // ->addJs('cart/checkout/method.js');
        $content = $layout->getChild('content');

        $methodForm = Mage::getBlock('cart/checkout_method');
        $content->addChild('method', $methodForm);

        $layout->toHtml();
    }
    public function successAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('cart/checkout/success.css');
        // ->addJs('cart/checkout/success.js');
        $content = $layout->getChild('content');

        $successPage = Mage::getBlock('cart/checkout_success');
        $content->addChild('method', $successPage);

        $layout->toHtml();
    }
}