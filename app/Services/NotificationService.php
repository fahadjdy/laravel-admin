<?php

namespace App\Services;

use App\Interfaces\NotificationInterface;
use App\Services\Notifications\SMSNotification;
use App\Services\Notifications\EmailNotification;

class NotificationService
{
    public static function make(string $channel): NotificationInterface
    {

        switch ($channel) {
            case 'sms':
                return new SMSNotification();
            case 'email':
            default:
                return new EmailNotification();
        }
    }
}
