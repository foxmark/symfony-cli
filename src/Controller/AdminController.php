<?php

namespace App\Controller;

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
        $message = ['title' => 'New Product', 'product_id' => 1, 'extra' => true];
        $this->producer->sendCommand('productMessage', $message);
        return $this->render('admin.html.twig');
    }
}
