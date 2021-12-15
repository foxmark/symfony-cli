<?php

namespace App\Command;

use App\Event\ProductEvent;
use App\Event\ProductEventType;
use App\Services\ProductService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class WorkCommand extends Command
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;
    /**
     * @var ProductService
     */
    private $productService;

    public function __construct(EventDispatcherInterface $eventDispatcher, ProductService $productService)
    {
        parent::__construct();
        $this->eventDispatcher = $eventDispatcher;
        $this->productService  = $productService;
    }

    protected function configure()
    {
        $this->setName('product:make')
            ->setDescription('Make Product')
            ->setHelp('Make New Product');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->eventDispatcher->dispatch(
            new ProductEvent('Name_'. time()),
            ProductEventType::CREATE
        );
        if ($this->productService->make()) {
            $output->write('Product ready.', true);
        } else {
            $output->write('Something went wrong.', true);
        }
        return 0;
    }
}
