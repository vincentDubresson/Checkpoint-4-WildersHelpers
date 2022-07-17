<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    private const TYPES = ['offre', 'demande'];

    public function load(ObjectManager $manager): void
    {


        foreach (self::TYPES as $type) {
            $postType = new Type();
            $postType->setName($type);
            $manager->persist($postType);
        }

        $manager->flush();
    }
}
