<?php

namespace M2S\Blog\Model\ResourceModel\Item;

use M2S\Blog\Model\Item;
use M2S\Blog\Model\ResourceModel\Item as ItemResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Item::class, ItemResource::class);
    }
}
