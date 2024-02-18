<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Entity\Categorie;
use App\Form\RegistrationFormType;
use App\Form\CategorieType;


class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(EntityManagerInterface $em, Request $request): Response
    {

        $usersData = $em->getRepository(User::class)-> findAll();

        // Fetch the 3 latest categories
        $categoriesData = $em->getRepository(Categorie::class)->findBy([], ['datetime' => 'DESC'], 3);


        return $this->render('accueil/index.html.twig', [
            // 'controller_name' => 'AccueilController',
            'categoriesData' => $categoriesData,
        ]);
    }

}
