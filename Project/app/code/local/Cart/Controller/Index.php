<?php

class Cart_Controller_Index extends Core_Controller_Front_Action
{
    protected $_allowedAction = [];
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('cart/view.css');
        $content = $layout->getChild('content');

        $cartView = Mage::getBlock('cart/view');
        $content->addChild("cartView", $cartView);

        $layout->toHtml();
    }
}