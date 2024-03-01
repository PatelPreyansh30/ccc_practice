<?php

class Banner_Block_Form extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('banner/admin/form.phtml');
    }
    public function getBanner()
    {
        return Mage::getModel('banner/banner')
            ->load($this->getRequest()->getParams('banner_id', 0));
    }
}