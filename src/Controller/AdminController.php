<?php

namespace App\Controller;

use App\Message\ProductMessage;
use App\Security\UserRoles;
use Enqueue\Client\ProducerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    private ProducerInterface $producer;

    public function __construct(ProducerInterface $producer)
    {
        $this->producer = $producer;
    }

    /**
     * @Route("/admin", name="admin_index")
     */
    public function index(MessageBusInterface $bus)
    {
        $this->denyAccessUnlessGranted(UserRoles::ADMIN);
        $message = new ProductMessage('Product', 1234, false);
        $this->producer->sendCommand('productMessage', $message->toArray());
        return $this->render('admin.html.twig');
    }
}
