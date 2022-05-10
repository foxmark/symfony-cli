<?php

namespace App\Controller;

use App\Message\SimpleMessage;
use App\Security\UserRoles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\Bridge\Amqp\Transport\AmqpStamp;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DelayStamp;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_index")
     */
    public function index(MessageBusInterface $bus)
    {
        $this->denyAccessUnlessGranted(UserRoles::ADMIN);
        $bus->dispatch(new SimpleMessage('New Admin Visit'), [new DelayStamp(500)]);
        $bus->dispatch(
            new SimpleMessage(
                'This will go to normal queue.'
            ),
            [
                new DelayStamp(500),
                new AmqpStamp('normal')
            ]
        );
        return $this->render('admin.html.twig');
    }
}
