<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    /**
     * @Route("/first", name="app_first")
     */
    public function index(): Response
    {
        return $this->render('first/index.html.twig', [
            'name' => 'mariem',
            'firstname' => 'makni'
        ]);
    }


//    /**
//     * @Route("/say/{name}/{fn}", name="say.hello")
//     */
    public function saySalem( $name, $fn): Response
    {
//        return $this -> render('first/hello.html.twig', [
//            'nom' => $name,
//            'prenom'=> $fn]);
//       $rand = rand(0,10);
//        echo $rand;
//        if($rand == 3){
//            return $this -> forward('App\Controller\FirstController::index');
//        }
        return $this->render('first/hello.html.twig', [
            'name' => $name,
            'firstname' => $fn,
//            'path' => ''
        ]);
    }

    #[Route('/foix/{int2<\d>}/{int1}', name: 'multiple', requirements:['int1' => '\d'] )]
    public function mult( $int1, $int2): Response{
        $res=$int2*$int1;

        return new Response("<h1>$res</h1>");
    }

    #[Route('/template', name: 'template')]
    public function template(): Response{

        return $this->render("template.html.twig");
    }

}




