<?php

namespace App\Controller;

use App\Entity\Chefs;
use App\Form\ChefsType;
use App\Repository\ChefsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("main/admin/chefs")
 */
class ChefsController extends AbstractController
{
    /**
     * @Route("/", name="chefs_index", methods={"GET"})
     */
    public function index(ChefsRepository $chefsRepository): Response
    {
        return $this->render('chefs/index.html.twig', [
            'chefs' => $chefsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="chefs_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $chef = new Chefs();
        $form = $this->createForm(ChefsType::class, $chef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chef);
            $entityManager->flush();

            return $this->redirectToRoute('chefs_index');
        }

        return $this->render('chefs/new.html.twig', [
            'chef' => $chef,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chefs_show", methods={"GET"})
     */
    public function show(Chefs $chef): Response
    {
        return $this->render('chefs/show.html.twig', [
            'chef' => $chef,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="chefs_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Chefs $chef): Response
    {
        $form = $this->createForm(ChefsType::class, $chef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chefs_index');
        }

        return $this->render('chefs/edit.html.twig', [
            'chef' => $chef,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chefs_delete", methods={"POST"})
     */
    public function delete(Request $request, Chefs $chef): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chef->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($chef);
            $entityManager->flush();
        }

        return $this->redirectToRoute('chefs_index');
    }
}
