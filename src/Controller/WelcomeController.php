<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WelcomeController extends AbstractController
{
    #[Route('/', name: 'app_welcome')]
    public function index(): Response
    {
        $currentDate = new \DateTimeImmutable('now', new \DateTimeZone('Europe/Paris'));
        return $this->render('welcome/index.html.twig', [
            'currentDate' => $currentDate->format('d/m/Y'),
        ]);
    }
}