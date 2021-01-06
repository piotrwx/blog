<?php


namespace M2S\Blog\Model;


use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\M2S\Blog\Model\ResourceModel\Item::class);
    }
}
