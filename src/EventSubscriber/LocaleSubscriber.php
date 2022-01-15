<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class LocaleSubscriber implements EventSubscriberInterface
{
    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();

        if ($request->getSession()->get('_locale')) {
            $request->setLocale($request->getSession()->get('_locale'));
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'kernel.request' => [['onKernelRequest', 17]],
        ];
    }
}
