<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use App\Services\WorkService;
use Symfony\Component\Console\Style\SymfonyStyle;

class WorkCommand extends Command
{

    /**
     * @var WorkService
     */
    private $work;
    /**
     * @var SymfonyStyle
     */
    private $symfonyStyle;

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
        $io = new SymfonyStyle($input, $output);
        //$this->work->useTool($input, $output);

        $message = 'This is a message';

        // common output elements
        $io->title($message);
        $io->section($message);
        $io->text($message);
        $io->comment($message);

        // more advanced output elements
        $io->note($message);
        $io->caution($message);
        $io->listing(['Element 1', 'Element 2']);

        $question = 'What time is is?';

        // ask for user's input
        $io->ask($question);
        $io->askHidden($question);
        $io->confirm($question, $default = true);
        $io->choice($question, ['Yes', 'No']);

        // display the result of the command or some important task
        $io->success($message);
        $io->error($message);
        $io->warning($message);

        return 0;
    }
}
