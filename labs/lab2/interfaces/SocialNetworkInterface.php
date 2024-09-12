<?php

namespace Social;

interface SocialNetworkInterface
{
    public function connect(string $loginOrEmail, string $password): boolean;
}