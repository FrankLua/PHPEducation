<?php

namespace Project\Services\Mail\Interface;

interface MailInterface
{
    public static function send(string $message, string $to): bool;
}
