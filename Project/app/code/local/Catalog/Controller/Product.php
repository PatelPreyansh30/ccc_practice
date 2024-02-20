<?php

class Catalog_Controller_Product extends Core_Controller_Front_Action
{
    public function newAction()
    {
        $layout = $this->getLayout();
        // $layout->getChild('head')->addJs('abc.js');
        $child = $layout->getChild('content');

        $productForm = $layout->createBlock('catalog/admin_product');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('catalog_product');
        $product = Mage::getModel('catalog/product')
            ->setData($data)
            ->save();
    }
}