<?php

class Catalog_Model_Product extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Catalog_Model_Resource_Product';
        $this->_collectionClass = 'Catalog_Model_Resource_Collection_Product';
    }

    public function getStatus()
    {
        $bindding = [
            '1' => 'Enabled',
            '0' => 'Disabled',
        ];
        return isset($this->_data['status']) ? $bindding[$this->_data['status']] : '';
    }
    public function getCategoryName()
    {
        $category = Mage::getModel('catalog/category')->load($this->getCategoryId());
        return $category->getCategoryName();
    }
}