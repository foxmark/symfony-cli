<?php

namespace App\Services;

use App\Services\ToolService;

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

    public function useTool()
    {
        $this->toolService->cut();
    }
}