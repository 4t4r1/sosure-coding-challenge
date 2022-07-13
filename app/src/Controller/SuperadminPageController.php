<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuperadminPageController extends AbstractController
{
    #[Route('/superadmin/page', name: 'app_superadmin_page')]
    public function index(): Response
    {
        return $this->render('superadmin_page/index.html.twig', [
            'controller_name' => 'SuperadminPageController',
        ]);
    }
}
