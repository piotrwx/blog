<?php

namespace M2S\Blog\Cron;

use M2S\Blog\Model\Config;
use M2S\Blog\Model\ItemFactory;

class AddItem
{
    private $itemFactory;

    private $config;

    public function __construct(ItemFactory $itemFactory, Config $config)
    {
        $this->config = $config;
        $this->itemFactory = $itemFactory;
    }

    public function execute()
    {
        if ($this->config->isEnabled()) {
            $this->itemFactory->create()
                ->setTitle('Scheduled post')
                ->save();
        }
    }
}
