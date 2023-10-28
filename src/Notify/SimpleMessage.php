<?php

namespace App\Notify;

class SimpleMessage extends \App\Notify
{
    /**
     * Just get some data from database for example. All heavy work can be done at send() method.
     */
    public function __construct(
        protected string $email,
        protected string $message
    ) {
    }

    /**
     * This method will be called after browser disconnect as last shutdown function.
     *
     * @throws \SFW\Exception
     */
    public function send(): void
    {
        self::sys('Mailer')
            ->create()
            ->setSubject('Simple message')
            ->addRecipient($this->email)
            ->setBody(
                self::sys('Templater')->transform('notify.send.message.html', [
                    'message' => $this->message,
                ])
            )
            ->send();
    }
}
