<?php

class Admin_Controller_Banner extends Core_Controller_Admin_Action
{
    protected $_allowedAction = [];
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('banner/form.css');
        $content = $layout->getChild('content');

        $bannerForm = Mage::getBlock('banner/form');
        $content->addChild('form', $bannerForm);

        $layout->toHtml();
    }
    public function saveAction()
    {
        $bannerData = $this->getRequest()->getPostData('banner');
        $bannerFileData = $this->getRequest()->getFileData('banner');

        $bannerName = $bannerFileData['name']['banner_path'];
        $bannerData['banner_path'] = $bannerName;

        $bannerModel = Mage::getModel('banner/banner');
        $bannerMediaPath = Mage::getBaseDir('media/banner/') . $bannerName;

        move_uploaded_file(
            $bannerFileData['tmp_name']['banner_path'],
            $bannerMediaPath
        );
        $bannerModel->setData($bannerData)
            ->save();

        $this->setRedirect('admin/banner/list');
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('banner/list.css');
        $child = $layout->getChild('content');

        $banneList = $layout->createBlock('banner/list');

        $child->addChild('list', $banneList);
        $layout->toHtml();
    }
    public function deleteAction()
    {
        $bannerId = $this->getRequest()->getParams('banner_id');
        $bannerData = Mage::getModel('banner/banner')
            ->load($bannerId);

        $bannerMediaPath = Mage::getBaseDir('media/banner/') . $bannerData->getBannerPath();
        unlink($bannerMediaPath);
        $bannerData->delete();

        $this->setRedirect('admin/banner/list');
    }
}