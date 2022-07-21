<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findBy([], ['id' => 'DESC']);

        return $this->render('user/list.html.twig', [
            'posts' => $posts,
        ]);
    }
}
