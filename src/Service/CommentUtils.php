<?php

namespace App\Service;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class CommentUtils
{
    private EntityManagerInterface $manager;
    private string $checkErrors = '';

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function getCheckErrors(): string
    {
        return $this->checkErrors;
    }

    public function checkCommentErrors(array $newComment): string
    {
        if (empty($newComment['comment'])) {
            $this->checkErrors = 'Merci de ne pas rentrer un commentaire vide';
        }

        return $this->checkErrors;
    }

    public function addComment(User $user, Post $post, array $newComment): void
    {

        $comment = new Comment();
        $newDate = new DateTime("now");
        
        $comment
            ->setComment($newComment['comment'])
            ->setUser($user)
            ->setPost($post)
            ->setCreationDate($newDate);

        $this->manager->persist($comment);
        $this->manager->flush();
    }
}