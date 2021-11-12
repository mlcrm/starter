<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    ){}

    public function load(ObjectManager $manager)
    {
        $admin = new User();

        $admin
            ->setEmail('esa659@gmail.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->hasher->hashPassword($admin, 'admin_'))
            ->setFirstname('Mutus')
            ->setLastname('Liber');

        $manager->persist($admin);
        $manager->flush();
    }
}
