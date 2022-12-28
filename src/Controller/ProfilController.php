<?php

namespace App\Controller;

use App\Entity\Informations;
use App\Entity\Users;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Users::class);
        $repo = $doctrine->getRepository(Informations::class);
        $informations = $repo->findAll();
        return $this->render('Profil/index.html.twig', [
            'Informations' => $informations
        ]);
    }
}
