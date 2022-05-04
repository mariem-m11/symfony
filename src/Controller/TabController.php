<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TabController extends AbstractController
{
    #[Route('/tab/{nb<\d+>?5}', name: 'app_tab')]
    public function index($nb): Response
    {
        $array = [];
        for ($i=0 ; $i<$nb ; $i++){
            $array[] = rand(0,20);

        }
        return $this->render('tab/index.html.twig', [
            'notes' => $array,
        ]);
    }


    #[Route('/table', name: 'app_table')]
    public function users(): Response
    {
        $users = [
            ['fn' => 'aymen', 'n' => 'sellaouti', 'age' => 39],
            ['fn' => 'skander', 'n' => 'sellaouti', 'age' => 3],
            ['fn' => 'souheib', 'n' => 'youssfi', 'age' => 59],
        ];
        return $this->render('table/index.html.twig', [
            'users' => $users
        ]);
    }
}
