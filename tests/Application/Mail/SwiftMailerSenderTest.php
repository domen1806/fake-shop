<?php

namespace App\Tests\Application\Mail;

use App\Application\Mail\SenderInterface;
use App\Application\Mail\SwiftMailerSender;
use PHPUnit\Framework\TestCase;
use \Mockery as m;
use Twig_Environment;

class SwiftMailerSenderTest extends TestCase
{
    /**
     * Checking, if class exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('App\Application\Mail\SwiftMailerSender'));
    }

    /**
     * Checking, if service is instance of correct interface
     */
    public function testInstanceOfInterface()
    {
        $this->assertInstanceOf(
            SenderInterface::class,
            new SwiftMailerSender($this->getMockSwiftMailer(), $this->getMockTwig()
            )
        );
    }

    /**
     * Checking, if send() works correct
     */
    public function testSendAddProductMessage()
    {
        $twigEnv  = $this->getMockTwig();
        $twigEnv
            ->shouldReceive('render')
            ->once()
            ->withArgs(['mail/addProduct.html.twig', ['productName' => 'Laptop']])
            ->andReturn('fake-template')
        ;

        $swiftMailer = $this->getMockSwiftMailer();
        $swiftMailer
            ->shouldReceive('send')
            ->once();
        ;

        $sender = new SwiftMailerSender($swiftMailer, $twigEnv);
        $sender->sendAddProductMessage('New Product was added!', 'info@fake-shop.com', 'reallyImportantUser@gmail.com', 'Laptop');
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        m::close();
    }

    /**
     * @return m\MockInterface|\Swift_Mailer
     */
    private function getMockSwiftMailer()
    {
        return m::mock(\Swift_Mailer::class);
    }

    /**
     * @return m\MockInterface|\Twig_Environment
     */
    private function getMockTwig()
    {
        return m::mock(Twig_Environment::class);
    }
}
