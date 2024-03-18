<?php

class Customer_Controller_Order extends Core_Controller_Front_Action
{
    protected $_notAllowedAction = ['list', 'view'];
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
}