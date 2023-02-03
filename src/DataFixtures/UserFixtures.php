<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //        création d'un user      //
        $user = new User;
        $user->setEmail('user@checkpoint.com');
        $user->setPassword('password');
        $manager->persist($user);

        //        création d'un admin      //
        $admin = new User;
        $admin->setEmail('admin@checkpoint.com');
        $admin->setPassword('adminpassword');
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $manager->flush();
    }
}
