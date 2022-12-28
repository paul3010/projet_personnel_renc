<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LikerController extends AbstractController
{
    #[Route('/liker', name: 'app_liker')]
    public function index(): Response
    {
        return $this->render('liker/index.html.twig', [
            'controller_name' => 'LikerController',
        ]);
    }
}
