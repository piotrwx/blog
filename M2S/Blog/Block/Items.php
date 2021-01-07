<?php

namespace M2S\Blog\Block;

use Magento\Framework\View\Element\Template;
use M2S\Blog\Model\ResourceModel\Item\Collection;
use M2S\Blog\Model\ResourceModel\Item\CollectionFactory;

class Items extends Template
{
    private $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory,
        Template\Context $context,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return \M2S\Blog\Model\ResourceModel\Item[]
     */
    public function getItems()
    {
        return $this->collectionFactory->create()->getItems();
    }
}
