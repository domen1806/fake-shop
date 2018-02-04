<?php

namespace App\Application\Query\ProductsList;

use App\Repository\ProductRepository;

class DoctrineProductsListQuery implements ProductListQueryInterface
{
    /**
     * @var ProductRepository
     */
    private $repository;

    /**
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function find(int $limit, int $page)
    {
        return $this->repository->findOrderedByCreatedAt($limit, $page);
    }
}
