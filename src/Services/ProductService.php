<?php

namespace App\Services;

use Psr\Log\LoggerInterface;

class ProductService
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
