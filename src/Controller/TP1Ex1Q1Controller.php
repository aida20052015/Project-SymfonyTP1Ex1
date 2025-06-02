<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TP1Ex1Q1Controller extends AbstractController
{
    #[Route('/t/p1/ex1/q1', name: 'app_tp1ex1q1')]
    public function index(): Response
    {
        return $this->render('tp1_ex1_q1/index.html.twig', [
            'controller_name' => 'TP1Ex1Q1Controller',
        ]);
    }
    

    #[Route('/tp1/ex1/q1/process', name: 'app_tp1ex1q1_process')]
    public function process(Request $request): Response
    {
        // Récupération des données du formulaire
        $prenom = $request->request->get('prenom');
        $nom = $request->request->get('nom');

        // Date et heure actuelles
        $dateHeure = new \DateTime();
        date_default_timezone_set('Europe/Paris');
        return $this->render('tp1_ex1_q1/result.html.twig', [
            'prenom' => $prenom,
            'nom' => $nom,
            'dateHeure' => $dateHeure,
        ]);
    }
}
