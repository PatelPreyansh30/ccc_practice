<?php

class Banner_Model_Banner extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Banner_Model_Resource_Banner';
        $this->_collectionClass = 'Banner_Model_Resource_Collection_Banner';
    }
}