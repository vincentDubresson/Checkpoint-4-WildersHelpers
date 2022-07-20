<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        UserRepository $userRepository,
        PostRepository $postRepository,
    ): Response {

        $posts = $postRepository->findBy([], ['id' => 'DESC']);

        $wilders = $userRepository->findBy([], ['id' => 'DESC']);

        return $this->render('home/index.html.twig', [
            'wilders' => $wilders,
            'posts' => $posts,
        ]);
    }
}
