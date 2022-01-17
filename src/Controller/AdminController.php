<?php

namespace App\Controller;

use App\Security\UserRoles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_index")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted(UserRoles::ADMIN);
        return $this->render('admin.html.twig');
    }
}
