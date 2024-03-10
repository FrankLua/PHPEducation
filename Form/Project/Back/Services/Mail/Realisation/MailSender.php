<?php

namespace Project\Services\Mail\Realisation;

use PHPMailer\PHPMailer\PHPMailer;
use Project\Services\Mail\BaseMail\MailConnect;
use Project\Services\Mail\Interface\MailInterface;

class MailSender extends MailConnect implements MailInterface
{
    public static function send(string $message, string $to): bool
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = parent::SMTP;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = parent::SMTP_PORT;

        $mail->Username = parent::SMTP_USER;
        $mail->Password = parent::PASSWORD;

        $mail->setFrom(parent::SMTP_USER);
        $mail->addAddress($to);

        $mail->Subject = "Ваша регистрация на концерт прошла успешно";
        $html = static::getStandartHTML() . "<div>" . $message . "</div></body>";
        $mail->msgHTML($html);
        $mail ->CharSet = "UTF-8";

        try {
            $mail->send();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    private static function getStandartHTML(): string
    {
        return "<html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
        </head>
        <body>";
    }
}
