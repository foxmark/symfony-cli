<?php

namespace App\Tests\Unit\Services;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Tests\DatabaseDependantTestCase;

class UserServiceTest extends DatabaseDependantTestCase
{
    protected $entityManager;

    public function testUser()
    {
        $user = new User();
        $user->setEmail('admin@server.com')
            ->setFirstName('Admin')
            ->setPassword('password');
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        /** @var UserRepository $user_rep */
        $user_rep = $this->entityManager->getRepository(User::class);
        $user = $user_rep->findOneBy(['email' => 'admin@server.com']);
        $this->assertTrue($user instanceof User);
    }
}
