<?php

namespace App\Controller;

use App\Entity\CategoriesFood;
use App\Form\CategoriesFoodType;
use App\Repository\CategoriesFoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categories/food")
 */
class CategoriesFoodController extends AbstractController
{
    /**
     * @Route("/", name="categories_food_index", methods={"GET"})
     */
    public function index(CategoriesFoodRepository $categoriesFoodRepository): Response
    {
        return $this->render('categories_food/index.html.twig', [
            'categories_foods' => $categoriesFoodRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categories_food_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categoriesFood = new CategoriesFood();
        $form = $this->createForm(CategoriesFoodType::class, $categoriesFood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoriesFood);
            $entityManager->flush();

            return $this->redirectToRoute('categories_food_index');
        }

        return $this->render('categories_food/new.html.twig', [
            'categories_food' => $categoriesFood,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categories_food_show", methods={"GET"})
     */
    public function show(CategoriesFood $categoriesFood): Response
    {
        return $this->render('categories_food/show.html.twig', [
            'categories_food' => $categoriesFood,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categories_food_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategoriesFood $categoriesFood): Response
    {
        $form = $this->createForm(CategoriesFoodType::class, $categoriesFood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categories_food_index');
        }

        return $this->render('categories_food/edit.html.twig', [
            'categories_food' => $categoriesFood,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categories_food_delete", methods={"POST"})
     */
    public function delete(Request $request, CategoriesFood $categoriesFood): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoriesFood->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoriesFood);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categories_food_index');
    }
}
