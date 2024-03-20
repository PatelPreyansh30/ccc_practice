<?php

class Admin_Controller_Order extends Core_Controller_Admin_Action
{
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addJs('customer/order/list.js')
            ->addCss('order/admin/list.css');
        $child = $layout->getChild('content');

        $adminList = $layout->createBlock('order/admin_list');

        $child->addChild('list', $adminList);
        $layout->toHtml();
    }
    public function cancelAction()
    {
        if ($this->getRequest()->isPost()) {
            $statusData = $this->getRequest()->getParams('status_history');

            $statusModel = Mage::getModel('sales/order_status_history')
                ->load($statusData['history_id']);

            if ($statusData['action'] == 'confirm') {
                $statusModel->addData('is_approved', 1)
                    ->addData('is_requested', 0)
                    ->addData('date', date('Y-m-d'))
                    ->addData('action_by', 'admin')
                    ->save();

                Mage::getModel('sales/order')
                    ->load($statusModel->getOrderId())
                    ->addData('status', $statusModel->getToStatus())
                    ->save();
            } elseif ($statusData['action'] == 'cancel') {
                $statusModel->addData('is_requested', 0)
                    ->save();
            }
            $this->setRedirect('admin/order/cancel');
        } else {
            $layout = $this->getLayout();
            $layout->getChild('head')
                ->addJs('customer/order/list.js')
                ->addCss('order/admin/list.css');
            $child = $layout->getChild('content');

            $cancelOrderList = $layout->createBlock('order/admin_cancel');

            $child->addChild('list', $cancelOrderList);
            $layout->toHtml();
        }
    }
    public function viewAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addJs('customer/order/view.js')
            ->addCss('order/admin/view.css');
        $child = $layout->getChild('content');

        $adminView = $layout->createBlock('order/admin_view');

        $child->addChild('view', $adminView);
        $layout->toHtml();

    }
    public function updateStatusAction()
    {
        $statusData = $this->getRequest()->getParams('status_history');
        $statusData['date'] = date('Y-m-d');
        $statusData['action_by'] = 'admin';

        $order = Mage::getModel('sales/order')
            ->load($statusData['order_id']);
        $statusData['from_status'] = $order->getStatus();
        $order->addData('status', $statusData['to_status']);

        Mage::getModel('sales/order_status_history')
            ->setData($statusData)
            ->save();

        $order->save();
        $this->setRedirect('admin/order/list');
    }
}