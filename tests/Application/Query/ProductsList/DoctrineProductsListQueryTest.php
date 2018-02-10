<?php

namespace App\Tests\Application\Query\ProductsList;

use App\Application\Query\ProductsList\DoctrineProductsListQuery;
use App\Application\Query\ProductsList\ProductListQueryInterface;
use App\Repository\ProductRepository;
use PHPUnit\Framework\TestCase;
use \Mockery as m;

class DoctrineProductsListQueryTest extends TestCase
{
    /**
     * Checking, if class exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('App\Application\Query\ProductsList\DoctrineProductsListQuery'));
    }

    /**
     * Checking, if correct interface was implemented
     */
    public function testImplementsCorrectInterface()
    {
        $this->assertInstanceOf(ProductListQueryInterface::class, new DoctrineProductsListQuery($this->getMockRepository()));
    }

    /**
     * Checking, if find calls correct function
     */
    public function testFind()
    {
        $repository = $this->getMockRepository();
        $repository
            ->shouldReceive('findOrderedByCreatedAt')
            ->once()
            ->withArgs([10, 6]);

        $query = new DoctrineProductsListQuery($repository);
        $query->find(10, 6);
    }

    /**
     * @return m\MockInterface|ProductRepository
     */
    private function getMockRepository()
    {
        return m::mock(ProductRepository::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        m::close();
    }
}
