<?php

namespace App\Processor;

use Interop\Queue\Context;
use Interop\Queue\Message;
use Interop\Queue\Processor;
use Psr\Log\LoggerInterface;

class ProductMessageProcessor implements Processor
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Message $message
     * @param Context $context
     *
     * @return string|object with __toString method implemented
     */
    public function process(Message $message, Context $context)
    {
        $body = json_decode($message->getBody(), true);
        $this->logger->info('Processor Worked!!!', ['body' => $body]);
        return self::ACK;
    }
}
