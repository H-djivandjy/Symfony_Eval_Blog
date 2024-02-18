<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function index(EntityManagerInterface $em, Request $request): Response
    {
        $articlesData = $em->getRepository(Article::class)-> findAll();

        return $this->render('articles/index.html.twig', [
            // 'articles' => $articleRepository->findAll(),
            'articlesData' => $articlesData,
        ]);
    }
}
