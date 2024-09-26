<?php

namespace Lab4\classes;

use Lab4\interfaces\Notification;
use Lab4\interfaces\SlackInterface;

class SlackNotification implements Notification
{
    private SlackInterface $slack;
    private string $chatId;

    public function __construct(SlackInterface $slack, string $chatId)
    {
        $this->slack = $slack;
        $this->chatId = $chatId;
    }

    public function send(string $title, string $message): void
    {
        $this->slack->auth();
        $this->slack->sendMessage($this->chatId, $title . '<br>' . $message);
    }
}