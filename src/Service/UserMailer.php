<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class UserMailer
{
    private MailerInterface $mailer;
    private ParameterBagInterface $parameters;

    public function __construct(MailerInterface $mailer, ParameterBagInterface $parameters)
    {
        $this->mailer = $mailer;
        $this->parameters = $parameters;
    }

    public function addPostSendMail(): void
    {
        $email = new Email();
        $email->from($this->parameters->get('mailer_from'))
            ->to($this->parameters->get('mailer_to'))
            ->subject('Une nouvelle annonce a été postée !')
            ->html(
            '<h1>Bonjour M. L\'administrateur !</h1>
            <p>Une nouvelle annonce a été postée.<br>
            Je t\'encourage grandement à aller vérifier s\'il n\'y a rien de supspect !</p>
            <p>À bientôt grand chef !</p>'
        );

        $this->mailer->send($email);
    }
}