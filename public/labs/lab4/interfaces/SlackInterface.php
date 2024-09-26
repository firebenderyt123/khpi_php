<?php

namespace Lab4\interfaces;

interface SlackInterface
{
    public function auth(): void;
    public function sendMessage(string $chatId, string $message): void;
}