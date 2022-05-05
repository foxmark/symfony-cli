<?php

namespace App\MessageHandler;

use App\Message\SimpleMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SimpleMessageHandler implements MessageHandlerInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(SimpleMessage $message)
    {
        $this->logger->debug('Message content: ' . $message->getContent());
    }

}
