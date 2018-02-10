<?php

namespace App\Tests\Domain;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * Checking, if class exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('App\Domain\Product'));
    }
}
