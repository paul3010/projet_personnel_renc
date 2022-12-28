<?php

namespace App\Controller;

use App\Entity\Informations;
use App\Entity\Users;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\InformationsRepository;



class OnlineController extends AbstractController
{
    #[Route('/online', name: 'app_online')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $informations = $doctrine->getRepository(Users::class)->findAll();
        return $this->render(
            'online/index.html.twig',
            [
                'informations' => $informations
            ]
        );
    }


    #[Route('/Afiche/{id}', name: 'affiche_user')]
    public function show(ManagerRegistry $doctrine, Informations $id): Response
    {
        $repo = $doctrine->getRepository(Informations::class);
        $informations = $repo->findBy(['id' => $id]);
        return $this->render('afficheuser/index.html.twig', [
            'information' => $informations
        ]);
    }
}
