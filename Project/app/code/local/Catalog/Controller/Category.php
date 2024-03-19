<?php
class Catalog_Controller_Category extends Core_Controller_Front_Action
{
    protected $_allowedAction = ['view'];
    public function viewAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('category/view.css');
        $content = $layout->getChild('content');

        $productView = Mage::getBlock('catalog/category_view');
        $content->addChild('view', $productView);

        $layout->toHtml();
    }
}