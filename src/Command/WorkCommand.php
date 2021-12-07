<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use App\Services\WorkService;

class WorkCommand extends Command
{

    /**
     * @var WorkService
     */
    private $work;

    public function __construct(WorkService $work)
    {
        parent::__construct();
        $this->work = $work;
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
        $this->work->useTool();
        return 0;
    }
}
