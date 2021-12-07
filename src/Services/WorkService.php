<?php

namespace App\Services;

use App\Services\ToolService;
use Symfony\Component\Console\Style\SymfonyStyle;

class WorkService
{
    /**
     * @var \App\Services\ToolService
     */
    private $toolService;

    public function __construct(ToolService $toolService)
    {

        $this->toolService = $toolService;
    }

    public function useTool($input, $output)
    {
        $io = new SymfonyStyle($input, $output);
        $headers = ['Parameter', 'Value', 'Time'];

        $rows = $this->toolService->cut();

        $io->table($headers, $rows);
    }
}
