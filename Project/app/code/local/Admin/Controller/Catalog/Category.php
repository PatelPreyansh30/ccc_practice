<?php

class Admin_Controller_Catalog_Category extends Core_Controller_Admin_Action
{
    protected $_allowedAction = [];
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('category/form.css')
            ->addJs('category/form.js');
        $child = $layout->getChild('content');

        $categoryForm = $layout->createBlock('catalog/admin_category_form');
        $child->addChild('form', $categoryForm);
        $layout->toHtml();
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
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('category/list.css');
        $child = $layout->getChild('content');

        $categoryList = $layout->createBlock('catalog/admin_category_list');

        $child->addChild('list', $categoryList);
        $layout->toHtml();
    }
}