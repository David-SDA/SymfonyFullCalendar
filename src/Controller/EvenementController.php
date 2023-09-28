<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    #[Route('/calendar', name: 'app_evenement')]
    public function index(): Response
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('app_home');
        }

        return $this->render('evenement/index.html.twig');
    }
}
