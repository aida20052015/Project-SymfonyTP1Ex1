<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use PDO;

class TP1Ex3Controller extends AbstractController
{
    #[Route('/tp1/ex3/connexion', name: 'app_tp1ex3_connexion')]
    public function connexion(Request $request): Response
    {
        // NE PAS FAIRE EN PRODUCTION - juste pour l'exercice
        if ($request->isMethod('POST')) {
            $login = $request->request->get('login');
            $mdp = $request->request->get('mdp');
            
            // Connexion à la base (à adapter avec vos paramètres)
            $pdo = new PDO('mysql:host=localhost;dbname=votre_base', 'utilisateur', 'motdepasse');
            
            // Requête vulnérable (injection SQL possible)
            $stmt = $pdo->query("SELECT * FROM InformationsConnexions WHERE Login='$login' AND MotdePasse='$mdp'");
            $user = $stmt->fetch();
            
            if ($user) {
                return $this->render('tp1_ex3/success.html.twig', [
                    'login' => $user['Login']
                ]);
            }
            
            return $this->render('tp1_ex3/connexion.html.twig', [
                'error' => 'Identifiants incorrects'
            ]);
        }
        
        return $this->render('tp1_ex3/connexion.html.twig');
    }
}