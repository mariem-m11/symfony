<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Cont1Controller extends AbstractController
{
    #[Route('/cont1', name: 'app_cont1')]
    public function index(): Response
    {
        return $this->render('cont1/index.html.twig', [
            'controller_name' => 'Cont1Controller',
        ]);
    }
}
