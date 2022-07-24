<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Service\CommentUtils;
use App\Service\UserMailer;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(
        Request $request,
        PostRepository $postRepository,
        UserRepository $userRepository,
        UserMailer $userMailer,
    ): Response {
        
        $post = new Post();
        $form = $this->createForm(PostType::class, $post, [
            'action' => $this->generateUrl('app_user'),
            'method' => 'POST'
        ]);

        $form->handleRequest($request);
        $dataRequest =  $request->request->all();
        if ($dataRequest) {
            $user = $userRepository->findOneBy(['id' => $dataRequest['user']]);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $newDate = new DateTime ("now");
            $post->setCreationDate($newDate);
            $post->setUser($user);
            $postRepository->add($post, true);
            $userMailer->addPostSendMail();

            return $this->redirectToRoute('app_user', [], Response::HTTP_SEE_OTHER);
        }

        $posts = $postRepository->findBy([], ['id' => 'DESC']);

        return $this->renderForm('user/list.html.twig', [
            'posts' => $posts,
            'form' => $form,
        ]);
    }

    #[Route('/user/comment/add/{userId}/{postId}', name: 'app_user_add_comment', methods: ['POST'])]
    #[Entity('user', options: ['id' => 'userId'])]
    #[Entity('post', options: ['id' => 'postId'])]
    public function addComment(User $user, Post $post, CommentUtils $commentUtils): ?Response
    {
        $newComment = array_map('trim', $_POST);

        $error = $commentUtils->checkCommentErrors($newComment);

        if (empty($error)) {
            $commentUtils->addComment($user, $post, $newComment);
        } else {
            $this->addFlash('danger', $error);
        }
        return $this->redirectToRoute('app_user', [],);

    }
}
