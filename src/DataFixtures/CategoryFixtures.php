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
        'DevWeb',
        'Divers',
        'Garde',
        'Informatique',
        'Jardin',
        'Jeux-Vidéo',
        'Musique',
        'Santé'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $category) {
            $postCategory = new Category();
            $postCategory->setName($category);
            $this->addReference('category_' . $category, $postCategory);
            $manager->persist($postCategory);
        }

        $manager->flush();
    }
}
