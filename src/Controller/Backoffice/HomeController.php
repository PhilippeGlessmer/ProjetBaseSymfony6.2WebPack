<?php

namespace App\Controller\Backoffice;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/backoffice', name: 'app_backoffice_home')]
    public function index(): Response
    {

//            throw new Exception('Invalid strength passed ');

        return $this->render('backoffice/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
