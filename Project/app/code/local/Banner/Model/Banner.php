<?php

class Banner_Model_Banner extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Banner_Model_Resource_Banner';
        $this->_collectionClass = 'Banner_Model_Resource_Collection_Banner';
    }
    public function getStatus()
    {
        $bindding = [
            '1' => 'Enabled',
            '0' => 'Disabled',
        ];
        return isset($this->_data['status']) ? $bindding[$this->_data['status']] : '';
    }
    public function getBannerImage()
    {
        return Mage::getBaseUrl('media/banner/'.$this->getBannerPath());
    }
}