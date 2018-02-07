<?php

namespace App\Application\Command\Product;

use App\Domain\Product;
use App\Infrastructure\DoctrineProducts;

final class SetNewProductHandler
{
    /**
     * @var DoctrineProducts
     */
    private $products;

    /**
     * @param DoctrineProducts $products
     */
    public function __construct(DoctrineProducts $products)
    {
        $this->products = $products;
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
        //todo dorobic tutaj wysylke maila
    }
}
