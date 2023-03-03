<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\UberPasswordHasherInterface;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $users = [];
        // $product = new Product();
        // $manager->persist($product);
        $admin = new User();
        $admin 
                ->setUsername('SuperAdmin')
                ->setRoles(['ROLE_USER , ROLE_ADMIN'])
                ->setPassword('admin')
                ->setMail('admin@test.fr');

        
        $users[] = $admin;
        $manager->persist($admin);
    }
}
