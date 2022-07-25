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
            'title' => 'Whouaouh ! Quel super site !',
            'picture' => 'aide_php.png',
            'description' => 'Non je plaisante, je viens de tout casser ! :)',
            'category' => 'Divers',
            'type' => 'demande',
            'user' => 'Thomas',
        ],
        [
            'title' => 'Fusce in magna nulla Aenean.',
            'picture' => 'history.jpg',
            'description' => 'Suspendisse eu dolor sed justo lacinia iaculis. Mauris ut ex convallis, auctor erat id, vulputate nisl. Aliquam quis lobortis magna. Sed vulputate imperdiet nunc in.',
            'category' => 'Divers',
            'type' => 'offre',
            'user' => 'Nicolas',
        ],
        [
            'title' => 'Fusce in magna nulla Aenean.',
            'picture' => 'enfant.png',
            'description' => 'Suspendisse eu dolor sed justo lacinia iaculis. Mauris ut ex convallis, auctor erat id, vulputate nisl. Aliquam quis lobortis magna. Sed vulputate imperdiet nunc in.',
            'category' => 'Garde',
            'type' => 'demande',
            'user' => 'Emmanuelle',
        ],
        [
            'title' => 'Fusce in magna nulla Aenean.',
            'picture' => 'computer.jpg',
            'description' => 'Suspendisse eu dolor sed justo lacinia iaculis. Mauris ut ex convallis, auctor erat id, vulputate nisl. Aliquam quis lobortis magna. Sed vulputate imperdiet nunc in.',
            'category' => 'Informatique',
            'type' => 'offre',
            'user' => 'Christopher',
        ],
        [
            'title' => 'Fusce in magna nulla Aenean.',
            'picture' => 'computer.jpg',
            'description' => 'Suspendisse eu dolor sed justo lacinia iaculis. Mauris ut ex convallis, auctor erat id, vulputate nisl. Aliquam quis lobortis magna. Sed vulputate imperdiet nunc in.',
            'category' => 'Informatique',
            'type' => 'offre',
            'user' => 'Vincent',
        ],
        [
            'title' => 'Fusce in magna nulla Aenean.',
            'picture' => 'history.jpg',
            'description' => 'Suspendisse eu dolor sed justo lacinia iaculis. Mauris ut ex convallis, auctor erat id, vulputate nisl. Aliquam quis lobortis magna. Sed vulputate imperdiet nunc in.',
            'category' => 'Divers',
            'type' => 'demande',
            'user' => 'Cidjie',
        ],
        [
            'title' => 'Fusce in magna nulla Aenean.',
            'picture' => 'computer.jpg',
            'description' => 'Suspendisse eu dolor sed justo lacinia iaculis. Mauris ut ex convallis, auctor erat id, vulputate nisl. Aliquam quis lobortis magna. Sed vulputate imperdiet nunc in.',
            'category' => 'DevWeb',
            'type' => 'demande',
            'user' => 'Justine',
        ],
        [
            'title' => 'Besoin d\'aide en PHP',
            'picture' => 'aide_php.png',
            'description' => 'Je rencontre un problème dans un controll...... Non je plaisante ! Je suis le DIEU du PHP ! Mouahahahaaa !',
            'category' => 'DevWeb',
            'type' => 'demande',
            'user' => 'Thomas',
        ],
        [
            'title' => 'Si toi aussi tu aimes l\'histoire de Lyon.',
            'picture' => 'history.jpg',
            'description' => 'Je te propose une visite guidée de notre belle ville avec anecdotes historiques garanties ! Dégustation offerte dans la cave la plus prestigieuse du 5ème Arrondissement. 300€ la demi-journée !',
            'category' => 'Divers',
            'type' => 'offre',
            'user' => 'Yannis',
        ],
        [
            'title' => 'Putain de div',
            'picture' => 'computer.jpg',
            'description' => 'Sérieux elle me soûle ste div ! Y en aurait pas un qui sait comment centrer ce truc ? La ça commence sérieusement à me faire ch*** !',
            'category' => 'DevWeb',
            'type' => 'demande',
            'user' => 'Gautier',
        ],
        [
            'title' => 'Annale du Destin',
            'picture' => 'annales_destin.png',
            'description' => 'Hello ! Je vends ce jeu extraordinaire si ca intéresse quelqu\'un. Jeu sur PS4, X-box-One, PC... Ben quoi ? j\'ai le droit d\'en avoir plein non ? #tombé-du-camion',
            'category' => 'Jeux-Vidéo',
            'type' => 'offre',
            'user' => 'Théo',
        ],
        [
            'title' => 'Quelqu\'un pour garder ma fille ?',
            'picture' => 'enfant.png',
            'description' => 'Par pitié ! Est-ce qu\'il y aurait quelqu\'un qui peut garder ma fille pour que je puisse suivre mes cours de Symfony correctement ? Paiement à l\'heure :)',
            'category' => 'Garde',
            'type' => 'demande',
            'user' => 'Célie',
        ],
        [
            'title' => 'Il n\'est jamais trop tard pour planter !',
            'picture' => 'aide_php.png',
            'description' => 'Vous le savez, j\'adore entretenir mon jardin. C\'est pourquoi je propose d\'aider ceux qui n\'ont pas la main verte. Grâce à moi vos fruits et légumes pousseront ! Accepte le paiement en rosé :)',
            'category' => 'Jardin',
            'type' => 'offre',
            'user' => 'David',
        ],
    ];

    public function load(ObjectManager $manager): void
    {

        $postNumber = 1;
        $dayDate = 10;
        foreach (self::POSTS as $post) {
            $wilderPost = new Post();
            $newDate = new DateTime("2022-07-$dayDate");
            $wilderPost
                ->setTitle($post['title'])
                ->setPicture($post['picture'])
                ->setDescription($post['description'])
                ->setCreationDate($newDate)
                ->setCategory($this->getReference('category_' . $post['category']))
                ->setType($this->getReference('type_' . $post['type']))
                ->setUser($this->getReference('user_' . $post['user']));
            $this->addReference('post_' . $postNumber, $wilderPost);
            $dayDate++;
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
