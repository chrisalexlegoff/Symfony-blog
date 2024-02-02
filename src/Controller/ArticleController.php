<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article/{slug}', name: 'show_article')]
    public function index(): Response
    {
        return $this->render('article/show.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}
