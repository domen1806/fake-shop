<?php

namespace App\Domain;

final class Product
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
     * @var string
     */
    private $currency;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @param string $name
     * @param string $description
     * @param float  $price
     * @param string $currency
     */
    public function __construct(string $name, string $description, float $price, string $currency)
    {
        $this->name        = $name;
        $this->description = $description;
        $this->price       = $price;
        $this->createdAt   = new \DateTime();
        $this->currency    = $currency;
    }
}
