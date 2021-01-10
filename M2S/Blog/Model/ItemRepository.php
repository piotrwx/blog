<?php

namespace M2S\Blog\Model;

use M2S\Blog\Api\ItemRepositoryInterface;
use M2S\Blog\Model\ResourceModel\Item\CollectionFactory;

class ItemRepository implements ItemRepositoryInterface
{
    private $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }
}
