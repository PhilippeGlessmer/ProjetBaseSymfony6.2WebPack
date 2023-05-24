<?php

namespace App\Controller\Utilisateurs;

use App\Entity\Utilisateurs\UserProfil;
use App\Form\Utilisateurs\UserProfilType;
use App\Repository\Utilisateurs\UserProfilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/utilisateurs/user/profil')]
class UserProfilController extends AbstractController
{
    #[Route('/', name: 'app_utilisateurs_user_profil_index', methods: ['GET'])]
    public function index(UserProfilRepository $userProfilRepository): Response
    {
        return $this->render('utilisateurs/user_profil/index.html.twig', [
            'user_profils' => $userProfilRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_utilisateurs_user_profil_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserProfilRepository $userProfilRepository): Response
    {
        $userProfil = new UserProfil();
        $form = $this->createForm(UserProfilType::class, $userProfil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userProfilRepository->save($userProfil, true);

            return $this->redirectToRoute('app_utilisateurs_user_profil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateurs/user_profil/new.html.twig', [
            'user_profil' => $userProfil,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateurs_user_profil_show', methods: ['GET'])]
    public function show(UserProfil $userProfil): Response
    {
        return $this->render('utilisateurs/user_profil/show.html.twig', [
            'user_profil' => $userProfil,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_utilisateurs_user_profil_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UserProfil $userProfil, UserProfilRepository $userProfilRepository): Response
    {
        $form = $this->createForm(UserProfilType::class, $userProfil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userProfilRepository->save($userProfil, true);

            return $this->redirectToRoute('app_utilisateurs_user_profil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateurs/user_profil/edit.html.twig', [
            'user_profil' => $userProfil,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateurs_user_profil_delete', methods: ['POST'])]
    public function delete(Request $request, UserProfil $userProfil, UserProfilRepository $userProfilRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userProfil->getId(), $request->request->get('_token'))) {
            $userProfilRepository->remove($userProfil, true);
        }

        return $this->redirectToRoute('app_utilisateurs_user_profil_index', [], Response::HTTP_SEE_OTHER);
    }
}
