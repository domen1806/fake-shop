<?php

namespace App\Infrastructure;

use App\Domain\Product;
use Doctrine\ORM\EntityManager;

class DoctrineProducts
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $this->em->persist($product);
        $this->em->flush();
    }
}
