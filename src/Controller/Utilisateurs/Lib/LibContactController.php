<?php

namespace App\Controller\Utilisateurs\Lib;

use App\Entity\Utilisateurs\Lib\LibContact;
use App\Form\Utilisateurs\Lib\LibContactType;
use App\Repository\Utilisateurs\Lib\LibContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/utilisateurs/lib/lib/contact')]
class LibContactController extends AbstractController
{
    #[Route('/', name: 'app_utilisateurs_lib_lib_contact_index', methods: ['GET'])]
    public function index(LibContactRepository $libContactRepository): Response
    {
        return $this->render('utilisateurs/lib/lib_contact/index.html.twig', [
            'lib_contacts' => $libContactRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_utilisateurs_lib_lib_contact_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LibContactRepository $libContactRepository): Response
    {
        $libContact = new LibContact();
        $form = $this->createForm(LibContactType::class, $libContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $libContactRepository->save($libContact, true);

            return $this->redirectToRoute('app_utilisateurs_lib_lib_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateurs/lib/lib_contact/new.html.twig', [
            'lib_contact' => $libContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateurs_lib_lib_contact_show', methods: ['GET'])]
    public function show(LibContact $libContact): Response
    {
        return $this->render('utilisateurs/lib/lib_contact/show.html.twig', [
            'lib_contact' => $libContact,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_utilisateurs_lib_lib_contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LibContact $libContact, LibContactRepository $libContactRepository): Response
    {
        $form = $this->createForm(LibContactType::class, $libContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $libContactRepository->save($libContact, true);

            return $this->redirectToRoute('app_utilisateurs_lib_lib_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateurs/lib/lib_contact/edit.html.twig', [
            'lib_contact' => $libContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateurs_lib_lib_contact_delete', methods: ['POST'])]
    public function delete(Request $request, LibContact $libContact, LibContactRepository $libContactRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$libContact->getId(), $request->request->get('_token'))) {
            $libContactRepository->remove($libContact, true);
        }

        return $this->redirectToRoute('app_utilisateurs_lib_lib_contact_index', [], Response::HTTP_SEE_OTHER);
    }
}
