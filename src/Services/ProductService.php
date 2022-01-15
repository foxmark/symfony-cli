<?php

namespace App\Services;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class ProductService
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(LoggerInterface $logger, EntityManagerInterface $entityManager)
    {
        $this->logger        = $logger;
        $this->entityManager = $entityManager;
    }

    public function make(): ?int
    {
        try {
            $product = new Product();
            $product->setName('SomeName' . rand(100, 999))
                ->setSKU('SKU_' . time())
                ->setActive(1);
            $this->entityManager->persist($product);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            return null;
        }
        return $product->getId();
    }

    public function show(int $id): ?Product
    {
        $repository = $this->entityManager->getRepository(Product::class);
        $product = $repository->find($id);
        if (!$product) {
            $this->logger->info('Product Not found for ID:' . $id);
            return null;
        }
        return $product;
    }
}
