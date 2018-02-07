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
     */
    public function __construct(string $name, string $description, float $price)
    {
        $this->name        = $name;
        $this->description = $description;
        $this->price       = $price;
        $this->createdAt   = new \DateTime();
    }
}
