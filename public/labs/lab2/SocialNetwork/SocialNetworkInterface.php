<?php

namespace Lab2\SocialNetwork;

interface SocialNetworkInterface
{
    public function connect(string $loginOrEmail, string $password): bool;
    public function publish(string $message): bool;
}