<?php

namespace App\Services;

class ToolService
{
    public function cut()
    {
        return [
            ['Param1', 'Value1', time()],
            ['Param2', 'Value2', time()]
        ];
    }
}
