<?php

namespace App\Notify;

class SendMessage extends \SFW\Notify
{
    /**
     * Fetches data from database or just prepares your notify.
     *
     * If notify is created during a transaction, it will only be processed if the commit is successful.
     */
    public function __construct(
        protected string $email,
        protected string $message
    ) {
    }

    /**
     * Builds and yields or returns structures.
     *
     * This method called after browser disconnect.
     *
     * @throws \SFW\Exception
     */
    public function build(\SFW\NotifyStruct $defaultStruct): iterable
    {
        $struct = clone $defaultStruct;

        $struct->subject = 'Example message';

        $struct->recipients[] = $this->email;

        $struct->context['message'] = $this->message;

        $struct->body = $this->sys('Templater')->transform('.message.example.html.php', $struct->context);

        yield $struct;
    }
}
