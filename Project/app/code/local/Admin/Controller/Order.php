<?php

class Admin_Controller_Order extends Core_Controller_Admin_Action
{
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('order/admin/list.css');
        $child = $layout->getChild('content');

        $adminList = $layout->createBlock('order/admin_list');

        $child->addChild('list', $adminList);
        $layout->toHtml();
    }
}