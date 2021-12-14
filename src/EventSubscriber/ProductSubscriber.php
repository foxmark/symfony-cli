<?php

namespace App\EventSubscriber;

use App\Event\ProductEvent;
use App\Event\ProductEventType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psr\Log\LoggerInterface;

class ProductSubscriber implements EventSubscriberInterface
{
    /**
     * @var LoggerInterface
     */
    private $log;

    public function __construct(LoggerInterface $productLogger)
    {
        $this->log = $productLogger;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ProductEventType::CREATE => ['onProductCreate', 0],
            ProductEventType::UPDATE => ['onProductUpdate', 0],
            ProductEventType::DELETE => ['onProductDelete', 0]
        ];
    }

    public function onProductCreate(ProductEvent $event)
    {
        // TODO: handle new product created
        $this->log->debug('new product created for:' . $event->getName());
    }

    public function onProductUpdate(ProductEvent $event)
    {
        // TODO: handle product updated
        $this->log->debug('new product updated for:' . $event->getName());
    }

    public function onProductDelete(ProductEvent $event)
    {
        // TODO: handle product deleted
        $this->log->debug('new product deleted for:' . $event->getName());
    }
}
