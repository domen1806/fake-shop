<?php

namespace App\Tests\Infrastructure;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Component\Form\Test\TypeTestCase;

class ProductTypeTest extends TypeTestCase
{
    /**
     * Checking, if new product was added correctly
     */
    public function testAddProduct()
    {
        $data   = [
            'name'        => 'Pencil',
            'description' => 'Curabitur interdum wisi nunc, sed ante ipsum primis in massa. Suspendisse sapien. Morbi pede. Lorem ipsum erat, fringilla aliquet. Aliquam dolor leo tristique ut, ligula. Nam ultrices. Sed adipiscing ligula. Sed adipiscing non, lobortis augue. Donec auctor euismod. Integer adipiscing.',
            'price'       => 11.1
        ];

        $form = $this->factory->create(ProductType::class);
        $product = new Product(
            'Pencil',
            'Curabitur interdum wisi nunc, sed ante ipsum primis in massa. Suspendisse sapien. Morbi pede. Lorem ipsum erat, fringilla aliquet. Aliquam dolor leo tristique ut, ligula. Nam ultrices. Sed adipiscing ligula. Sed adipiscing non, lobortis augue. Donec auctor euismod. Integer adipiscing.',
            11.1
        );
        $product->setName('Pencil');
        $product->setDescription('Curabitur interdum wisi nunc, sed ante ipsum primis in massa. Suspendisse sapien. Morbi pede. Lorem ipsum erat, fringilla aliquet. Aliquam dolor leo tristique ut, ligula. Nam ultrices. Sed adipiscing ligula. Sed adipiscing non, lobortis augue. Donec auctor euismod. Integer adipiscing.');
        $product->setPrice(11.1);

        $form->submit($data);
        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($product, $form->getData());

        $view = $form->createView();

        $dataKeys = array_keys($data);
        $formKeys = array_keys($view->children);
        $changes  = array_diff($dataKeys, $formKeys);

        $this->assertEmpty($changes);
    }
}
