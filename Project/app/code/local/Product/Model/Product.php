<?php

class Product_Model_Product extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Product_Model_Resource_Product';
        $this->_collectionClass = 'Product_Model_Resource_Collection_Product';
    }
}