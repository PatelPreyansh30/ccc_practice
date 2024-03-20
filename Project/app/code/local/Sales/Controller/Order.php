<?php

class Sales_Controller_Order extends Core_Controller_Front_Action
{
    public function cancelAction()
    {
        echo "<pre>";
        $cancelData = $this->getRequest()->getParams('status_history');

        $status = Mage::getModel('sales/order')
            ->load($cancelData['order_id'])
            ->getStatus();
        Mage::getModel('sales/order_status_history')
            ->setData($cancelData)
            ->addData('from_status', $status)
            ->addData('to_status', 'cancelled')
            ->addData('action_by', "customer")
            ->addData('date', date('Y-m-d'))
            ->addData('is_requested', 1)
            ->save();
        $this->setRedirect("customer/order/view?order_id={$cancelData['order_id']}");
    }
}