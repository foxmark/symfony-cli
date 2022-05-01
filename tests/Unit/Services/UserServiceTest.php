<?php

namespace App\Tests\Unit\Services;

use App\Entity\Product;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Tests\DatabasePrimer;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserServiceTest extends KernelTestCase
{
    protected $entityManager;

    public function setUp(): void
    {
        $kernel = self::bootKernel();
        DatabasePrimer::prime($kernel);
        /** @var EntityManager entityManager */
        $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }

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
