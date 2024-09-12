<?php

require __DIR__ . '/../../../vendor/autoload.php';

use Lab2\SocialNetwork\Facebook;
use Lab2\SocialNetwork\LinkedIn;

$facebook = new Facebook();
$linkedIn = new LinkedIn();

$facebook->connect("login", "passwd");
$linkedIn->connect("email", "passwd");
$facebook->publish("Hello Facebook");
$linkedIn->publish("Hello LinkedIn");