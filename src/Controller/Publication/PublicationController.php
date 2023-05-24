<?php

namespace App\Controller\Publication;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/publication', name: 'app_publication_')]
class PublicationController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('publication/publication/index.html.twig', [
            'controller_name' => 'PublicationController',
        ]);
    }
    #[Route('/cat', name: 'categorie')]
    public function grid(): Response
    {
        return $this->render('publication/publication/grid.html.twig', [
            'controller_name' => 'PublicationController',
        ]);
    }
    #[Route('/view', name: 'view')]
    public function view(): Response
    {
        return $this->render('publication/publication/view.html.twig', [
            'controller_name' => 'PublicationController',
        ]);
    }
}
