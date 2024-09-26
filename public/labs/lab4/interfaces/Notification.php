<?php

namespace Lab4\interfaces;

interface Notification
{
    public function send(string $title, string $message);
}
