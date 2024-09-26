<?php

namespace Lab4\classes;

use Lab4\interfaces\SlackInterface;

class Slack implements SlackInterface
{
    private string $login;
    private string $apiKey;

    public function __construct(string $login, string $apiKey)
    {
        $this->login = $login;
        $this->apiKey = $apiKey;
    }

    public function auth(): void
    {
        echo "Slack authenticated<br>";
    }

    public function sendMessage(string $chatId, string $message): void
    {
        echo "Slack sent to {$chatId} message: {$message}<br>";
    }
}