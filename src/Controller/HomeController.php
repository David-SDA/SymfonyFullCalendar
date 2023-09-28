<?php

namespace App\Controller;

use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EvenementRepository $evenementRepository): Response
    {
        $events = $evenementRepository->findAll();

        $allEvents = [];

        foreach($events as $event){
            $allEvents[] = [
                'id' => $event->getId(),
                'start' => $event->getDateDebut()->format('Y-m-d H:i:s'),
                'end' => $event->getDateFin()->format('Y-m-d H:i:s'),
                'title' => $event->getNomEvenement(),
            ];
        }

        $data = json_encode($allEvents);
        return $this->render('home/index.html.twig', compact('data'));
    }
}
