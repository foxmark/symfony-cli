<?php

namespace App\EventSubscriber;

use App\Event\ProductEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psr\Log\LoggerInterface;

class ProductSubscriber implements EventSubscriberInterface
{
    /**
     * @var LoggerInterface
     */
    private $log;

    public function __construct(LoggerInterface $logger)
    {
        $this->log = $logger;
    }

    public static function getSubscribedEvents()
    {
        return [
            ProductEvents::CREATE => ['onProductCreate', 0],
            ProductEvents::UPDATE => ['onProductUpdate', 0],
            ProductEvents::DELETE => ['onProductDelete', 0]
        ];
    }

    public function onProductCreate()
    {
        // TODO: handle new product created
        $this->log->debug('new product created');
    }

    public function onProductUpdate()
    {
        // TODO: handle product updated
        $this->log->debug('new product updated');
    }

    public function onProductDelete()
    {
        // TODO: handle product deleted
        $this->log->debug('new product deleted');
    }
}
