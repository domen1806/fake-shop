<?php

namespace App\Application\Mail;

class SwiftMailerSender implements SenderInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var \Twig_Environment
     */
    private $twigEnv;

    /**
     * @param \Swift_Mailer     $mailer
     * @param \Twig_Environment $twigEnv
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twigEnv)
    {
        $this->mailer  = $mailer;
        $this->twigEnv = $twigEnv;
    }

    /**
     * {@inheritdoc}
     */
    public function sendAddProductMessage(string $subject, string $from, string $to, string $productName)
    {
        $body    = $this->twigEnv->render('mail/addProduct.html.twig', ['productName' => $productName]);
        $message = (new \Swift_Message())
            ->setSubject($subject)
            ->setFrom($from)
            ->setTo($to)
            ->setBody($body);

        $this->mailer->send($message);
    }
}
