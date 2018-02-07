<?php

namespace App\Tests\Application\Command\Product;

use App\Application\Command\Product\SetNewProduct;
use PHPUnit\Framework\TestCase;
use SimpleBus\Message\Name\NamedMessage;

class SetNewProductTest extends TestCase
{
    /**
     * Checking, if class exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('App\Application\Command\Product\SetNewProduct'));
    }

    /**
     * Checking, if correct interface was implemented
     */
    public function testImplementsCorrectInterface()
    {
        $this->assertInstanceOf(NamedMessage::class, new SetNewProduct('Some-fake-thing', 'Really-good-description', 15));
    }

    /**
     * Checking access to object values
     */
    public function testCompareObjectValues()
    {
        $object = new SetNewProduct('Keyboard', 'Drogi Marszałku, Wysoka Izbo. PKB rośnie Nikt inny was nie zapewni iż aktualna struktura organizacji jest że, zmiana przestarzałego systemu obsługi jest że, konsultacja z powodu systemu finansowego pociąga za sobą proces wdrożenia i realizacji dalszych kierunków rozwoju. Podobnie, konsultacja z dotychczasowymi zasadami systemu wymaga niezwykłej precyzji w przygotowaniu i unowocześniania systemu finansowego koliduje z szerokim aktywem umożliwia w większym stopniu tworzenie postaw uczestników wobec zadań stanowionych przez organizację.', 14.99);

        $this->assertEquals(
            'Keyboard',
            $object->getName()
        );
        $this->assertEquals(
            'Drogi Marszałku, Wysoka Izbo. PKB rośnie Nikt inny was nie zapewni iż aktualna struktura organizacji jest że, zmiana przestarzałego systemu obsługi jest że, konsultacja z powodu systemu finansowego pociąga za sobą proces wdrożenia i realizacji dalszych kierunków rozwoju. Podobnie, konsultacja z dotychczasowymi zasadami systemu wymaga niezwykłej precyzji w przygotowaniu i unowocześniania systemu finansowego koliduje z szerokim aktywem umożliwia w większym stopniu tworzenie postaw uczestników wobec zadań stanowionych przez organizację.',
            $object->getDescription()
            );
        $this->assertEquals(
            14.99,
            $object->getPrice()
        );
    }
}
