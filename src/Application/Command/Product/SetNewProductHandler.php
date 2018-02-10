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
     * @var string
     */
    private $localeName;

    /**
     * @param DoctrineProducts  $products
     * @param SwiftMailerSender $sender
     * @param string            $localeName
     */
    public function __construct(DoctrineProducts $products, SwiftMailerSender $sender, string $localeName)
    {
        $this->products   = $products;
        $this->sender     = $sender;
        $this->localeName = $localeName;
    }

    /**
     * @param SetNewProduct $command
     */
    public function handle(SetNewProduct $command)
    {
        setlocale( LC_ALL,  $this->localeName);
        $localeInfo = localeconv();
        $currency = empty($localeInfo['int_curr_symbol']) ? 'PLN' : $localeInfo['int_curr_symbol'];

        $product = new Product(
            $command->getName(),
            $command->getDescription(),
            $command->getPrice(),
            $currency
        );

        $this->products->addProduct($product);
        $this->sender->sendAddProductMessage('Hey! New product was just added!', 'info@fake-shop.com', 'fake@example.com', $command->getName());
    }
}
