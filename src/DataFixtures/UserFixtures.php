<?php

namespace App\DataFixtures;

use App\Entity\AdminUser;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    ){}

    public function load(ObjectManager $manager)
    {
        $admin = new AdminUser();
        $user = new User();

        $admin
            ->setEmail('admin@example.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->hasher->hashPassword($admin, 'admin_'))
            ->setFirstname('John')
            ->setLastname('Doe');

        $user
            ->setEmail('user@example.com')
            ->setRoles(['ROLE_USER'])
            ->setPassword($this->hasher->hashPassword($admin, 'user_'))
            ->setFirstname('Jane')
            ->setLastname('Doe');

        $manager->persist($admin);
        $manager->persist($user);
        $manager->flush();
    }
}
