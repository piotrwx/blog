<?php


namespace M2S\Blog\Controller\Adminhtml\Item;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use M2S\Blog\Model\ItemFactory;

class Save extends Action
{
    private $itemFactory;

    public function __construct(
        Action\Context $context,
        ItemFactory $itemFactory
    ) {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->itemFactory->create()
            ->setData($this->getRequest()->getPostValue()['general'])
            ->save();
        return $this->resultRedirectFactory->create()->setPath('m2s/index/index');
    }
}
