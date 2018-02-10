<?php

namespace App\Application\Mail;

interface SenderInterface
{
    /**
     * @param string $subject
     * @param string $from
     * @param string $to
     * @param string $productName
     */
    public function sendAddProductMessage(string $subject, string $from, string $to, string $productName);
}
