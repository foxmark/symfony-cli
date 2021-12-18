<?php

namespace App\Services;

use App\Entity\Product;
use App\Repository\ProductRepository;
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
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(LoggerInterface $logger, ProductRepository $productRepository)
    {
        $this->logger            = $logger;
        $this->productRepository = $productRepository;
    }

    public function make(): ?int
    {
        try {
            $product = new Product();
            $product->setName('SomeName' . rand(100, 999))
                ->setSKU('SKU_' . time())
                ->setActive(1);
            $this->productRepository->persist($product);
        } catch (\Exception $e) {
            return null;
        }
        return $product->getId();
    }

    public function show(int $id): ?Product
    {
        $product = $this->productRepository->find($id);
        if (!$product) {
            $this->logger->info('Product Not found for ID:' . $id);
            return null;
        }
        return $product;
    }
}
