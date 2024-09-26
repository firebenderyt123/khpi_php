<?php

namespace Lab4\classes;

use Lab4\interfaces\Notification;

class SMSNotification implements Notification
{
    private string $phone;
    private string $sender;

    public function __construct(string $phone, string $sender)
    {
        $this->phone = $phone;
        $this->sender = $sender;
    }

    public function send(string $title, string $message): void
    {
        $this->sendMessage($title . "<br>" . $message);
    }

    protected function sendMessage(string $message): void
    {
        echo "SMS to {$this->phone} from {$this->sender} sent: {$message}";
    }
}