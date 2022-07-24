<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use App\Form\PostType;
use App\Repository\PostRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user/post')]
class PostController extends AbstractController
{
    #[Route('/{userId}', name: 'app_post_index', methods: ['GET'])]
    #[Entity('user', options: ['id' => 'userId'])]
    public function index(PostRepository $postRepository, User $user): Response
    {
        $posts = $postRepository->findBy(['user' => $user]);;

        return $this->render('user/post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/{userId}/show/{postId}', name: 'app_post_show', methods: ['GET'])]
    #[Entity('user', options: ['id' => 'userId'])]
    #[Entity('post', options: ['id' => 'postId'])]
    public function show(Post $post, User $user): Response
    {
        $userId = $user->getId();

        return $this->render('user/post/show.html.twig', [
            'post' => $post,
            'userId' => $userId,
        ]);
    }

    #[Route('/{userId}/{postId}/edit', name: 'app_post_edit', methods: ['GET', 'POST'])]
    #[Entity('user', options: ['id' => 'userId'])]
    #[Entity('post', options: ['id' => 'postId'])]
    public function edit(Request $request, Post $post, User $user, PostRepository $postRepository): Response
    {
        $userId = $user->getId();

        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $postRepository->add($post, true);

            return $this->redirectToRoute('app_post_index', [
                'userId' => $userId,
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/post/edit.html.twig', [
            'post' => $post,
            'form' => $form,
            'userId' => $userId,
        ]);
    }

    #[Route('/{userId}/delete/{postId}', name: 'app_post_delete', methods: ['POST'])]
    #[Entity('user', options: ['id' => 'userId'])]
    #[Entity('post', options: ['id' => 'postId'])]
    public function delete(Request $request, Post $post, User $user, PostRepository $postRepository): Response
    {
        $userId = $user->getId();

        if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->request->get('_token'))) {
            $postRepository->remove($post, true);
        }

        return $this->redirectToRoute('app_post_index', [
            'userId' => $userId,
        ], Response::HTTP_SEE_OTHER);
    }
}
