<?php

class Customer_Controller_Order extends Core_Controller_Front_Action
{
    protected $_allowedAction = ['track'];
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('customer/order/list.css');
        $child = $layout->getChild('content');

        $orderList = $layout->createBlock('customer/order_list');

        $child->addChild('list', $orderList);
        $layout->toHtml();
    }
    public function viewAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('customer/order/view.css');
        $child = $layout->getChild('content');

        $orderView = $layout->createBlock('customer/order_view');

        $child->addChild('list', $orderView);
        $layout->toHtml();
    }
    public function trackAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('customer/order/track.css')
            ->addJs('customer/order/track.js');
        $child = $layout->getChild('content');

        $orderTrack = $layout->createBlock('customer/order_track');

        $child->addChild('track', $orderTrack);
        $layout->toHtml();
    }
}