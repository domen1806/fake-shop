<?php

namespace App\Tests\Controller;

use App\Controller\ProductController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ProductControllerTest extends WebTestCase
{
    /**
     * Checking, if class exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('App\Controller\ProductController'));
    }

    /**
     * Checking, if controller is instance of correct class
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf(Controller::class, new ProductController());
    }

    /**
     * Checking "products" route
     */
    public function testGetListFirstPage()
    {
        $client = static::createClient();
        $client->request('GET', '/products');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    /**
     * Checking "products" route
     */
    public function testGetListThirdPage()
    {
        $client = static::createClient();
        $client->request('GET', '/products/3');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    /**
     * Checking "new_product" route with unauthorized user
     */
    public function testAddProductUnauthorized()
    {
        $client = static::createClient();
        $client->request('POST', '/admin/new-product');

        $this->assertEquals(Response::HTTP_UNAUTHORIZED, $client->getResponse()->getStatusCode());
    }

    /**
     * Checking "new_product" route with authorized user without posting data
     */
    public function testAddProductAuthorized()
    {
        $client = static::createClient([], ['PHP_AUTH_USER' => 'Dominik', 'PHP_AUTH_PW' => 'passwordReallyHardToGuess',]);
        $client->request('GET', '/admin/new-product');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
}
