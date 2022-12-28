<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AfficheuserController extends AbstractController
{

    #[Route('/Afiche/{id}', name: 'affiche_user')]
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $repository = $doctrine->getRepository(Users::class)->findAll();
        return $this->render(
            'afficheuser/index.html.twig',
            [
                'repo' => $repository
            ]
        );
    }
}
