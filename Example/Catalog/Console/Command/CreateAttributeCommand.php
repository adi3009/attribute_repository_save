<?php

namespace Example\Catalog\Console\Command;

use Example\Catalog\Model\AttributeCreator;
use Magento\Framework\App\State as AppState;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateAttributeCommand extends Command
{
    private $appState;
    private $attributeCreator;

    public function __construct(AppState $appState, AttributeCreator $attributeCreator)
    {
        $this->appState = $appState;
        $this->attributeCreator = $attributeCreator;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('example:catalog:create_attribute');
        $this->setDescription('Create example attribute');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Creating...</info>');
        $this->appState->setAreaCode('catalog');
        $this->attributeCreator->create();
        $output->writeln('<info>Complete.</info>');
    }
}