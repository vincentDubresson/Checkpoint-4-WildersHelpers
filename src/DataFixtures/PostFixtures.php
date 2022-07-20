<?php

namespace App\DataFixtures;

use App\Entity\Post;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
    private const POSTS = [
        [
            'title' => 'Quelqu\'un pour garder ma fille ?',
            'picture' => 'build/images/post/enfant.png',
            'description' => 'Par pitié ! Est-ce qu\'il y aurait quelqu\'un qui peut garder ma fille pour que je puisse suivre mes cours de Symfony correctement ? Paiement à l\'heure :)',
            'category' => 'Garde',
            'type' => 'demande',
            'user' => 'Célie',
        ],
        [
            'title' => 'Besoin d\'aide en PHP',
            'picture' => 'build/images/post/aide_php.png',
            'description' => 'Je rencontre un problème dans un controll...... Non je plaisante ! Je suis le DIEU du PHP ! Mouahahahaaa !',
            'category' => 'DevWeb',
            'type' => 'demande',
            'user' => 'Thomas',
        ],
        [
            'title' => 'Putain de div',
            'picture' => 'build/images/post/computer.jpg',
            'description' => 'Sérieux elle me soûle ste div ! Y en aurait pas un qui sait comment centrer ce truc ? La ça commence sérieusement à me faire ch*** !',
            'category' => 'DevWeb',
            'type' => 'demande',
            'user' => 'Gautier',
        ],
        [
            'title' => 'Annale du Destin',
            'picture' => 'build/images/post/annales_destin.png',
            'description' => 'Hello ! Je vends ce jeu extraordinaire si ca intéresse quelqu\'un. Jeu sur PS4, X-box-One, PC... Ben quoi ? j\'ai le droit d\'en avoir plein non ? #tombé-du-camion',
            'category' => 'Jeux-Vidéo',
            'type' => 'offre',
            'user' => 'Théo',
        ],
        [
            'title' => 'Il n\'est jamais trop tard pour planter !',
            'picture' => 'build/images/post/garden.jpeg',
            'description' => 'Vous le savez, j\'adore entretenir mon jardin. C\'est pourquoi je propose d\'aider ceux qui n\'ont pas la main verte. Grâce à moi vos fruits et légumes pousseront ! Accepte le paiement en rosé :)',
            'category' => 'Jardin',
            'type' => 'offre',
            'user' => 'David',
        ],
        [
            'title' => 'Si toi aussi tu aimes l\'histoire de Lyon.',
            'picture' => 'build/images/post/history.jpg',
            'description' => 'Je te propose une visite guidée de notre belle ville avec anecdotes historiques garanties ! Dégustation offerte dans la cave la plus prestigieuse du 5ème Arrondissement. 300€ la demi-journée !',
            'category' => 'Divers',
            'type' => 'offre',
            'user' => 'Yannis',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        $postNumber = 1;
        foreach (self::POSTS as $post) {
            $wilderPost = new Post();
            $newDate = new DateTime("2022-07-1$postNumber");
            $wilderPost
                ->setTitle($post['title'])
                ->setPicture($post['picture'])
                ->setDescription($post['description'])
                ->setCreationDate($newDate)
                ->setCategory($this->getReference('category_' . $post['category']))
                ->setType($this->getReference('type_' . $post['type']))
                ->setUser($this->getReference('user_' . $post['user']));
            $this->addReference('post_' . $postNumber, $wilderPost);

            $postNumber++;
            $manager->persist($wilderPost);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [

            CategoryFixtures::class,
            TypeFixtures::class,
            UserFixtures::class,

        ];
    }
}
