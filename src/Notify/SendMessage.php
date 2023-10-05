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
        // Fetch data from database here.
    }

    /**
     * Builds and yields or returns structures.
     *
     * This method called after browser disconnect as last shutdown function.
     *
     * @throws \SFW\Templater\Exception
     */
    public function build(\SFW\NotifyStruct $defaultStruct): iterable
    {
        $struct = clone $defaultStruct;

        $struct->subject = 'Example message';

        $struct->recipients[] = $this->email;

        $struct->body = $this->sys('Templater')->transform('notify.send.message.html', [
            'message' => $this->message,
        ]);

        yield $struct;
    }
}
