<?php

namespace App\Tests\Unit\Services;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Tests\DatabasePrimer;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductServiceTest extends KernelTestCase
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

    public function testCanCreateProduct()
    {
        $product = new Product();
        $product->setName('New Product Name')
            ->setSKU('SKU_' . time())
            ->setActive(1);
        $this->entityManager->persist($product);
        $this->entityManager->flush();

        /** @var EntityManager entityManager */
        $db = $this->entityManager->getRepository(Product::class);
        $saved_product = $db->find($product->getId());
        $this->assertSame($saved_product, $product);
    }

    public function testOne()
    {
        $this->assertTrue(true);
    }
}
