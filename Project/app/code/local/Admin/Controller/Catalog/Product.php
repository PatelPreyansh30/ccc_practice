<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('product/form.css');
        $child = $layout->getChild('content');

        $productForm = $layout->createBlock('catalog/admin_product_form');

        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('catalog_product');
        Mage::getModel('catalog/product')
            ->setData($data)
            ->save();
    }
    public function deleteAction()
    {
        $productId = $this->getRequest()->getParams('product_id');
        Mage::getModel('catalog/product')
            ->setId($productId)
            ->delete();
    }
}