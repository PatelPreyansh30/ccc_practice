<?php

class Page_Block_Footer extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('page/footer.phtml');
    }
    protected function getCategoryUrl($id)
    {
        return $this->getUrl("catalog/category/view?category_id={$id}");
    }
    public function getCategories()
    {
        $list = [];
        $collection = Mage::getModel('catalog/category')
            ->getCollection()->getData();

        foreach ($collection as $category) {
            $list[] =
                "<li>
                    <a 
                        href='{$this->getCategoryUrl($category->getCategoryId())}'>
                        {$category->getCategoryName()}
                    </a>
                </li>";
        }
        return $list;
    }
}