<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    private const COMMENTS = [
        [
            'comment' => 'Personne ?? :(',
            'user' => 'Célie',
            'post' => '12'
        ],
        [
            'comment' => 'C\'est pas marrant :(',
            'user' => 'Célie',
            'post' => '12'
        ],
        [
            'comment' => 'J\'vous jure elle est sage... :\'(',
            'user' => 'Célie',
            'post' => '12'
        ],
        [
            'comment' => 'Vocal sur Slack ?! Je t\'expliquerai ;)',
            'user' => 'Vincent',
            'post' => '10'
        ],
        [
            'comment' => 'Ca sent l\'arnaque... Y a rien qui pousse en plein Juillet avec cette chaleur !',
            'user' => 'Ludovic',
            'post' => '13'
        ],
        [
            'comment' => 'Je me disais la même ^^',
            'user' => 'Emmanuelle',
            'post' => '13'
        ],
        [
            'comment' => 'Y a des caves à bière ??!!',
            'user' => 'Justine',
            'post' => '9'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::COMMENTS as $comment) {
            $wilderComment = new Comment();
            $newDate = new DateTime("2022-07-17");
            $wilderComment
                ->setComment($comment['comment'])
                ->setCreationDate($newDate)
                ->setUser($this->getReference('user_' . $comment['user']))
                ->setPost($this->getReference('post_' . $comment['post']));
            
                $manager->persist($wilderComment);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [

            PostFixtures::class,
            UserFixtures::class,

        ];
    }
}
