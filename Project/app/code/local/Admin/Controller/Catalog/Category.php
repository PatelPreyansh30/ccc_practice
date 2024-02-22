<?php

class Admin_Controller_Catalog_Category extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('category/form.css');
        $child = $layout->getChild('content');

        $categoryForm = $layout->createBlock('catalog/admin_category');
        $child->addChild('form', $categoryForm);
        echo $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('catalog_category');
        Mage::getModel('catalog/category')
            ->setData($data)
            ->save();
    }
    public function deleteAction()
    {
        $categoryId = $this->getRequest()->getParams('category_id');
        Mage::getModel('catalog/category')
            ->setId($categoryId)
            ->delete();
    }
}