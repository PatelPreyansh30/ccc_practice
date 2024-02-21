<?php

class Catalog_Model_Resource_Product extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('catalog_product', 'product_id');
    }
}