<?php

namespace App\Controller;

use App\Entity\CategoriesFood;
use App\Repository\CategoriesFoodRepository;
use App\Repository\ChefsRepository;
use App\Repository\FoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(ChefsRepository $chefsRepository, FoodRepository $foodRepository, CategoriesFoodRepository $categoriesFoodRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'chefs'=> $chefsRepository->findchef(),
            'foods'=> $foodRepository->foodburger(),
            'categoriefoods'=> $categoriesFoodRepository->findAll()

        ]);
    }
}
