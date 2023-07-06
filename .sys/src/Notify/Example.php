<?php

namespace App\Notify;

class Example extends \SFW\Notify
{
    public function __construct(protected string $email, protected string $message) {}

    public function build(\SFW\NotifyStruct $defaultStruct): array
    {
        $structs = [];

        $struct = clone $defaultStruct;

        $struct->subject = 'Example message';

        $struct->sender = self::$config['my']['mailer_default_sender'];

        $struct->recipients[] = $this->email;

        $struct->replies = self::$config['my']['mailer_default_replies'];

        $struct->e['message'] = $this->message;

        $struct->body = $this->sys('Templater')->transform($struct->e, '.message.example.php');

        $structs[] = $struct;

        return $structs;
    }
}
