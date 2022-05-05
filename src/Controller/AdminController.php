<?php

namespace App\Controller;

use App\Message\SimpleMessage;
use App\Security\UserRoles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_index")
     */
    public function index(MessageBusInterface $bus)
    {
        $this->denyAccessUnlessGranted(UserRoles::ADMIN);
        $bus->dispatch(new SimpleMessage('This is my message to you-u-u-u'));
        return $this->render('admin.html.twig');
    }
}
