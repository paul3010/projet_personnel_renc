<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MutuelController extends AbstractController
{
    #[Route('/mutuel', name: 'app_mutuel')]
    public function index(): Response
    {
        return $this->render('mutuel/index.html.twig', [
            'controller_name' => 'MutuelController',
        ]);
    }
}
