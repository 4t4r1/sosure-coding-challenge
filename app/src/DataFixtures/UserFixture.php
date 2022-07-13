<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // create users
        $user1 = new User('ben', 'benpass123', 'user');
        $manager->persist($user1);
        $user2 = new User('ed', 'edpass123', 'superadmin');
        $manager->persist($user2);
        $user3 = new User('matt', 'mattpass123', 'admin');
        $manager->persist($user3);
        $user4 = new User('simon', 'simonpass123', 'user');
        $manager->persist($user4);
        $user5 = new User('geoff', 'geoffpass123', 'admin');
        $manager->persist($user5);
        // write to database
        $manager->flush();
    }
}
