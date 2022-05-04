<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/todo')]
class ToDoControlleController extends AbstractController
{

    #[Route('/', name: 'app_to_do_controlle')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();

        //afficher notre tab de todo
        if ($session->has('todos')) {

        } else {
            $todos = [
                'achat' => 'acheter clé USB',
                'cours' => 'Finaliser mon cours',
                'correction' => 'corriger mes examens'
            ];
            $session->set('todos', $todos);
            $this->addFlash('info', "La liste des todos viens d'etre initialisée");


        }
        return $this->render('to_do_controlle/index.html.twig');
    }

    #[Route('/add/{name?test}/{content}', name: 'todo.add', defaults: ['content' => 'prayer'])]
    public function addTodo(Request $request, $name, $content) : RedirectResponse
    {
        $session = $request->getSession();
        if ($session->has('todos')) {
            $todos = $session->get('todos');
            if (isset($todos[$name])) {
                $this->addFlash('error', "list already exist ");
            } else {
                $todos[$name] = $content;
                $this->addFlash('success', "added successfully");
                $session->set('todos', $todos);

            }

        } else {
            $this->addFlash('error', "list isn't yet initialised ");

        }
        return $this->redirectToRoute('app_to_do_controlle');
    }

    #[Route('/update/{name}/{content}', name: 'todo.update')]
    public function updateTodo(Request $request, $name, $content): RedirectResponse
    {
        $session = $request->getSession();

        if ($session->has('todos')) {
            $todos = $session->get('todos');
            if (isset($todos[$name])) {
                $todos[$name] = $content;
                $this->addFlash('success', "updated successfully");
                $session->set('todos', $todos);

            } else {
                $this->addFlash('error', "list doesn't exist ");

            }

        } else {
            $this->addFlash('error', "list isn't yet initialised ");

        }
        return $this->redirectToRoute('app_to_do_controlle');
    }

    #[Route('/delete/{name}', name: 'todo.delete')]
    public function deleteTodo(Request $request, $name): RedirectResponse
    {
        $session = $request->getSession();

        if ($session->has('todos')) {
            $todos = $session->get('todos');
            if (isset($todos[$name])) {
               unset($todos[$name]) ;
                $session->set('todos', $todos);
                $this->addFlash('success', "deleted successfully");
            } else {
                $this->addFlash('error', "list doesn't exist ");
            }
        } else {
            $this->addFlash('error', "list isn't yet initialised ");
        }
        return $this->redirectToRoute('app_to_do_controlle');
    }

    #[Route('/reset', name: 'todo.reset')]
    public function resetTodo(Request $request):RedirectResponse
    {
        $session = $request->getSession();
        if ($session->has('todos')) {
            $session->clear();
            //or
           // $session->remove('todos');

        }
        return $this->redirectToRoute('app_to_do_controlle');
    }


}