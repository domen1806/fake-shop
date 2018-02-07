<?php

namespace App\Application\Command\Product;

use App\Application\Mail\SwiftMailerSender;
use App\Domain\Product;
use App\Infrastructure\DoctrineProducts;

final class SetNewProductHandler
{
    /**
     * @var DoctrineProducts
     */
    private $products;

    /**
     * @var SwiftMailerSender
     */
    private $sender;

    /**
     * @param DoctrineProducts  $products
     * @param SwiftMailerSender $sender
     */
    public function __construct(DoctrineProducts $products, SwiftMailerSender $sender)
    {
        $this->products = $products;
        $this->sender   = $sender;
    }

    /**
     * @param SetNewProduct $command
     */
    public function handle(SetNewProduct $command)
    {
        $product = new Product(
            $command->getName(),
            $command->getDescription(),
            $command->getPrice()
        );

        $this->products->addProduct($product);
        $this->sender->sendAddProductMessage('Hey! New product was just added!', 'info@fake-shop.com', 'fake@example.com', $command->getName());
    }
}
