<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    private const CATEGORIES = [
        'Bricolage',
        'Cuisine',
        'Cinéma',
        'Dev web',
        'Divers',
        'Garde d\'enfant',
        'Informatique',
        'Jardin',
        'Jeux Vidéo',
        'Musique',
        'Santé'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $category) {
            $postCategory = new Category();
            $postCategory->setName($category);
            $manager->persist($postCategory);
        }

        $manager->flush();
    }
}
