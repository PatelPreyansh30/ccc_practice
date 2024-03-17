<?php
class Customer_Controller_Address extends Core_Controller_Front_Action
{
    protected $_notAllowedAction = ['form', 'save', 'delete', 'list'];
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('customer/address/form.css')
            ->addJs('customer/address/form.js');

        $content = $layout->getChild("content");

        $addressForm = Mage::getBlock('customer/address');
        $content->addChild('form', $addressForm);

        $layout->toHtml();
    }
    public function saveAction()
    {
        $customerAddressData = $this->getRequest()
            ->getParams('customer_address');
        Mage::getModel('customer/address')
            ->setData($customerAddressData)
            ->removeData('email')
            ->removeData('quote_id')
            ->save();
        $this->setRedirect('customer/address/list');
    }
    public function listAction()
    {
        echo "List address";
    }
    public function deleteAction()
    {
        echo "Address Delete Action";
    }
}