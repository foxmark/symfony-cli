<?php

namespace App\Tests\Unit\Services;

use App\Entity\Product;
use App\Tests\DatabaseDependantTestCase;
use Doctrine\ORM\EntityManager;

class ProductServiceTest extends DatabaseDependantTestCase
{
    protected $entityManager;

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
}
