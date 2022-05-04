<?php

namespace App\Controller;

use App\Entity\Person;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends AbstractController
{
    #[Route('/person/add', name: 'app_person')]
    public function addPerson(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $person = new Person();
        $person->setFirstname('Mariem');
        $person->setName('makni');
        $person->setAge('21');
        $person2 = new Person();
        $person2->setFirstname('Kamilia');
        $person2->setName('Trigui');
        $person2->setAge('68');

        //ajouter l'op ds ma transaction
        $entityManager->persist($person);
        $entityManager->persist($person2);

        //execute la transaction
        $entityManager->flush();

        return $this->render('person/detail.html.twig', [
            'person' => $person,
        ]);
    }
}
