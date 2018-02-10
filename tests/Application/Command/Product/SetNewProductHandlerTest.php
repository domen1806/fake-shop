<?php

namespace App\Tests\Application\Command\Product;

use App\Application\Command\Product\SetNewProduct;
use App\Application\Command\Product\SetNewProductHandler;
use App\Application\Mail\SwiftMailerSender;
use App\Infrastructure\DoctrineProducts;
use PHPUnit\Framework\TestCase;
use \Mockery as m;

class SetNewProductHandlerTest extends TestCase
{
    /**
     * Checking, if class exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('App\Application\Command\Product\SetNewProductHandler'));
    }

    /**
     * Checking, if functions used in handle method, were called correctly
     */
    public function testHandle()
    {
        $command = $this->getMockedCommand();
        $command
            ->shouldReceive('getName')
            ->twice()
            ->andReturn('Glasses');
        $command
            ->shouldReceive('getDescription')
            ->once()
            ->andReturn('They are really good');
        $command
            ->shouldReceive('getPrice')
            ->once()
            ->andReturn(12.55);

        $doctrineProducts = $this->getMockedDoctrineProducts();
        $doctrineProducts
            ->shouldReceive('addProduct')
            ->once();

        $sender = $this->getMockedSender();
        $sender
            ->shouldReceive('sendAddProductMessage')
            ->once()
            ->withArgs(['Hey! New product was just added!', 'info@fake-shop.com', 'fake@example.com', 'Glasses']);

        $handler = new SetNewProductHandler($doctrineProducts, $sender, 'pl_PL');
        $handler->handle($command);
    }

    /**
     * @return m\MockInterface|DoctrineProducts
     */
    private function getMockedDoctrineProducts()
    {
        return m::mock(DoctrineProducts::class);
    }

    /**
     * @return m\MockInterface|SetNewProduct
     */
    private function getMockedCommand()
    {
        return m::mock(SetNewProduct::class);
    }

    /**
     * @return m\MockInterface|SwiftMailerSender
     */
    private function getMockedSender()
    {
        return m::mock(SwiftMailerSender::class);
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        m::close();
    }
}
