<?php

require __DIR__ . '/../../../vendor/autoload.php';

use Lab4\classes\Slack;
use Lab4\classes\SlackNotification;
use Lab4\classes\SMSNotification;

$slack = new Slack("login", "key");
$slackNotify = new SlackNotification($slack, 1000);
$slackNotify->send("title", "some info");

$sms = new SMSNotification("+380991234567", "Jhon Doe");
$sms->send("Advertisment", "Buy our tomatos!");