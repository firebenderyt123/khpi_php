<?php

namespace Lab2\SocialNetwork;

abstract class SocialNetwork implements SocialNetworkInterface
{
    public function publish(string $message): bool
    {
        echo "Message: `{$message}` published<br>";
        return true;
    }
}