<?php

namespace App\Tests\Infrastructure;

use App\Domain\Product;
use App\Infrastructure\DoctrineProducts;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;
use \Mockery as m;

class DoctrineProductsTest extends TestCase
{
    /**
     * Checking, if class exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('App\Infrastructure\DoctrineProducts'));
    }

    /**
     * Checking, if add function calls correctly required methods
     */
    public function testAddProduct()
    {
        $product = new Product('Really good stuff', 'Awesome description', 99.99);

        $em = $this->getMockedEntityManager();
        $em
            ->shouldReceive('persist')
            ->once()
            ->withArgs([$product]);
        $em
            ->shouldReceive('flush')
            ->once()
            ->withNoArgs();

        $service = new DoctrineProducts($em);
        $service->addProduct($product);
    }

    /**
     * @return m\MockInterface|EntityManager
     */
    private function getMockedEntityManager()
    {
        return m::mock(EntityManager::class);
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        m::close();
    }
}
