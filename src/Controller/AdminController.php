<?php

namespace App\Controller;

use App\Security\UserRoles;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_index")
     */
    public function index(LoggerInterface $specialLogger)
    {
        $this->denyAccessUnlessGranted(UserRoles::ADMIN);
        $specialLogger->debug('admin visit');
        return $this->render('admin.html.twig');
    }
}
