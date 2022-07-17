<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private const USERS = [
        [
            'firstName' => 'Thomas',
            'lastName' => 'Aldaitz',
            'email' => 'thomas@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Thomas_A.png',
            'polaroid' => 'build/images/polaroid_Thomas_A.png',
            'rotation' => 4,
        ],
        [
            'firstName' => 'Anthony',
            'lastName' => 'Gouton',
            'email' => 'anthony@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Anthony_G.png',
            'polaroid' => 'build/images/polaroid_Anthony_G.png',
            'rotation' => 3,
        ],
        [
            'firstName' => 'Célie',
            'lastName' => 'Russier',
            'email' => 'Celie@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Celie_R.png',
            'polaroid' => 'build/images/polaroid_Celie_R.png',
            'rotation' => 2,
        ],
        [
            'firstName' => 'Christopher',
            'lastName' => 'Cuzin',
            'email' => 'christopher@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Christopher_C.png',
            'polaroid' => 'build/images/polaroid_Christopher_C.png',
            'rotation' => 1,
        ],
        [
            'firstName' => 'Cidjie',
            'lastName' => 'Prefol',
            'email' => 'cidjie@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Cidjie_P.png',
            'polaroid' => 'build/images/polaroid_Cidjie_P.png',
            'rotation' => 4,
        ],
        [
            'firstName' => 'David',
            'lastName' => 'Hourdou',
            'email' => 'david@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_David_H.png',
            'polaroid' => 'build/images/polaroid_David_H.png',
            'rotation' => 3,
        ],
        [
            'firstName' => 'Emmanuelle',
            'lastName' => 'Allain',
            'email' => 'emmanuelle@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Emmanuelle_A.png',
            'polaroid' => 'build/images/polaroid_Emmanuelle_A.png',
            'rotation' => 2,
        ],
        [
            'firstName' => 'Gautier',
            'lastName' => 'Fondevilla',
            'email' => 'gautier@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Gautier_F.png',
            'polaroid' => 'build/images/polaroid_Gautier_F.png',
            'rotation' => 1,
        ],
        [
            'firstName' => 'Guillaume',
            'lastName' => 'Hartemann-Piollet',
            'email' => 'guillaume@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Guillaume_H.png',
            'polaroid' => 'build/images/polaroid_Guillaume_H.png',
            'rotation' => 4,
        ],
        [
            'firstName' => 'Justine',
            'lastName' => 'Gets',
            'email' => 'justine@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Justine_G.png',
            'polaroid' => 'build/images/polaroid_Justine_G.png',
            'rotation' => 3,
        ],
        [
            'firstName' => 'Kenny',
            'lastName' => 'McKormick',
            'email' => 'kenny@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Kenny_M.png',
            'polaroid' => 'build/images/polaroid_Kenny_M.png',
            'rotation' => 2,
        ],
        [
            'firstName' => 'Ludovic',
            'lastName' => 'Dormoy',
            'email' => 'ludovic@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Ludovic_D.png',
            'polaroid' => 'build/images/polaroid_Ludovic_D.png',
            'rotation' => 1,
        ],
        [
            'firstName' => 'Naji',
            'lastName' => 'Mouflih',
            'email' => 'naji@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Naji_M.png',
            'polaroid' => 'build/images/polaroid_Naji_M.png',
            'rotation' => 4,
        ],
        [
            'firstName' => 'Nicolas',
            'lastName' => 'Girardet',
            'email' => 'nicolas@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Nicolas_G.png',
            'polaroid' => 'build/images/polaroid_Nicolas_G.png',
            'rotation' => 3,
        ],
        [
            'firstName' => 'Théo',
            'lastName' => 'Boucher',
            'email' => 'theo@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Theo_B.png',
            'polaroid' => 'build/images/polaroid_Theo_B.png',
            'rotation' => 2,
        ],
        [
            'firstName' => 'Vincent',
            'lastName' => 'Dubresson',
            'email' => 'vincent@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_ADMIN', 'ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Vincent_D.png',
            'polaroid' => 'build/images/polaroid_Vincent_D.png',
            'rotation' => 1,
        ],
        [
            'firstName' => 'Yannis',
            'lastName' => 'Cristini',
            'email' => 'yannis@wildcodeschool.fr',
            'password' => 'toto69',
            'roles' => ['ROLE_USER'],
            'avatar' => 'build/images/avatars/avatar_Yannis_C.png',
            'polaroid' => 'build/images/polaroid_Yannis_C.png',
            'rotation' => 4,
        ],
    ];

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::USERS as $wilder) {
            $user = new User();
            $user->setFirstName($wilder['firstName'])
                ->setLastName($wilder['lastName'])
                ->setEmail($wilder['email'])
                ->setPassword(
                    $this->passwordHasher->hashPassword($user, $wilder['password'])
                )
                ->setRoles($wilder['roles'])
                ->setAvatar($wilder['avatar'])
                ->setPolaroid($wilder['polaroid'])
                ->setRotation($wilder['rotation']);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
