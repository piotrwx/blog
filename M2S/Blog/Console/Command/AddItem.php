<?php


namespace M2S\Blog\Console\Command;


use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use M2S\Blog\Model\ItemFactory;
use Magento\Framework\Console\Cli;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddItem extends Command
{
    const INPUT_KEY_NAME = 'title';

    private $itemFactory;

    private $logger;

    public function __construct(
        ItemFactory $itemFactory,
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
        $this->itemFactory = $itemFactory;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('m2s:item:add')
        ->addArgument(
            self::INPUT_KEY_NAME,
            InputArgument::REQUIRED,
            'Item title'
        );
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $item = $this->itemFactory->create();
        $item->setTitle($input->getArgument(self::INPUT_KEY_NAME));
        $item->setIsObjectNew(true);
        $item->save();
        $this->logger->debug('Item was created!');
        return Cli::RETURN_SUCCESS;
    }
}
