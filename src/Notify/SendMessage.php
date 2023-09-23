<?php

namespace App\Notify;

class SendMessage extends \SFW\Notify
{
    /**
     * Fetching data from database or just preparing your notify.
     *
     * If notify is created during a transaction, it will only be processed if the commit is successful.
     */
    public function __construct(
        protected string $email,
        protected string $message
    ) {
    }

    /**
     * Build and return array of structures.
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

        $struct->e['message'] = $this->message;

        $struct->body = $this->sys('Templater')->transform($struct->e, '.message.example.php');

        yield $struct;
    }
}
