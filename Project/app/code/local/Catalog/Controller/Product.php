<?php
class Catalog_Controller_Product extends Core_Controller_Front_Action
{
    protected $_allowedAction = [];
    public function viewAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('product/view.css');
        $content = $layout->getChild('content');

        $singleProductView = Mage::getBlock('catalog/product_view');
        $content->addChild('view', $singleProductView);

        $layout->toHtml();
    }
}