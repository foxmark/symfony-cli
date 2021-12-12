<?php

namespace App\Command;

use App\Event\ProductEvent;
use App\Event\ProductEvents;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use App\Services\WorkService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class WorkCommand extends Command
{

    /**
     * @var WorkService
     */
    private $work;
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(WorkService $work, EventDispatcherInterface $eventDispatcher)
    {
        parent::__construct();
        $this->work = $work;
        $this->eventDispatcher = $eventDispatcher;
    }

    protected function configure()
    {
        $this->setName('work:start')
            ->setDescription('Start work')
            ->setHelp('Work now');

        $this->addOption('work', 'w', InputOption::VALUE_OPTIONAL, 'Type', null);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->eventDispatcher->dispatch(
            new ProductEvent('something'),
            ProductEvents::CREATE
        );
        $this->work->useTool();
        return 0;
    }
}
