<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use App\Security\UserRoles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'email' => 'super@server.com',
            'roles' => [UserRoles::SUPER_USER]
        ]);
        UserFactory::createOne([
            'email' => 'admin@server.com',
            'roles' => [UserRoles::ADMIN]
        ]);
        UserFactory::createMany(5);
    }
}
