<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/dev-info", name="app_devinfo")
     */
    public function showPhpInfo()
    {
        return $this->redirectToRoute('_profiler_phpinfo');
    }
}
