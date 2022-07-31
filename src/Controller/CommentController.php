<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\User;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user/comment')]
class CommentController extends AbstractController
{
    #[Route('/{userId}', name: 'app_comment_index', methods: ['GET'])]
    #[Entity('user', options: ['id' => 'userId'])]
    public function index(CommentRepository $commentRepository, User $user): Response
    {
        $comments = $commentRepository->findBy(['user' => $user]);

        return $this->render('user/comment/index.html.twig', [
            'comments' => $comments,
        ]);
    }

    #[Route('/{userId}/show/{commentId}', name: 'app_comment_show', methods: ['GET'])]
    #[Entity('user', options: ['id' => 'userId'])]
    #[Entity('comment', options: ['id' => 'commentId'])]
    public function show(Comment $comment, User $user): Response
    {
        $userId = $user->getId();

        return $this->render('user/comment/show.html.twig', [
            'comment' => $comment,
            'userId' => $userId,
        ]);
    }

    #[Route('/{userId}/{commentId}/edit', name: 'app_comment_edit', methods: ['GET', 'POST'])]
    #[Entity('user', options: ['id' => 'userId'])]
    #[Entity('comment', options: ['id' => 'commentId'])]
    public function edit(Request $request, Comment $comment, User $user, CommentRepository $commentRepository): Response
    {
        $userId = $user->getId();
        //var_dump($userId); die();

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentRepository->add($comment, true);

            return $this->redirectToRoute('app_comment_index', [
                'userId' => $userId,
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/comment/edit.html.twig', [
            'comment' => $comment,
            'form' => $form,
            'userId' => $userId,
        ]);
    }

    #[Route('/{userId}/delete/{commentId}', name: 'app_comment_delete', methods: ['POST'])]
    #[Entity('user', options: ['id' => 'userId'])]
    #[Entity('comment', options: ['id' => 'commentId'])]
    public function delete(Request $request, Comment $comment, User $user, CommentRepository $commentRepository): Response
    {
        $userId = $user->getId();

        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
            $commentRepository->remove($comment, true);
        }

        return $this->redirectToRoute('app_comment_index', [
            'userId' => $userId,
        ], Response::HTTP_SEE_OTHER);
    }
}
