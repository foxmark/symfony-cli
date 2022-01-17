<?php

namespace App\Controller;

use App\Security\UserRoles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SuperController extends AbstractController
{
    /**
     * @Route("/super", name="super_index")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted(UserRoles::SUPER_USER);
        return $this->render('super.html.twig');
    }
}
