<?php

namespace App\Application\Command\Product;

use SimpleBus\Message\Name\NamedMessage;

class SetNewProduct implements NamedMessage
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $price;

    /**
     * @param string $name
     * @param string $description
     * @param float  $price
     */
    public function __construct(string $name, string $description, float $price)
    {
        $this->name        = $name;
        $this->description = $description;
        $this->price       = $price;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * {@inheritdoc}
     */
    public static function messageName()
    {
        return 'set_new_product';
    }
}