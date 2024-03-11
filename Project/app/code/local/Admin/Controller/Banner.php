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
        $bannerFileImage = $bannerFileData['name']['banner_path'];

        if (!empty($bannerFileImage)) {
            $bannerData['banner_path'] = $bannerFileImage;

            $bannerMediaPath = Mage::getBaseDir('media/banner/') . $bannerFileImage;

            if (isset($bannerData['banner_id'])) {
                $singleBannerData = Mage::getModel('banner/banner')->load($bannerData['banner_id']);
                unlink(Mage::getBaseDir('media/banner/') . $singleBannerData->getBannerPath());
            }
            
            if (file_exists($bannerMediaPath)) {

                $pathInfo = pathinfo($bannerMediaPath);
                $fileExtension = isset($pathInfo['extension']) ? '.' . $pathInfo['extension'] : '';
                $counter = 1;
                while (file_exists($pathInfo['dirname'] . '/' . $pathInfo['filename'] . $counter . $fileExtension)) {
                    $counter++;
                }
                $bannerName = $pathInfo['filename'] . $counter . $fileExtension;
                $bannerData['banner_path'] = $bannerName;
                $bannerMediaPath = $pathInfo['dirname'] . '/' . $bannerName;
            }

            move_uploaded_file(
                $bannerFileData['tmp_name']['banner_path'],
                $bannerMediaPath
            );
        } else {
            $bannerData['banner_path'] = $this->getRequest()->getPostData('banner_path');
        }

        Mage::getModel('banner/banner')->setData($bannerData)
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