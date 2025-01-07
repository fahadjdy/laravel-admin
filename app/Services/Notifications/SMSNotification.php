<?php

namespace App\Services\Notifications;

use App\Interfaces\NotificationInterface;

class SMSNotification implements NotificationInterface
{
    public function send(array $data): void
    {
        // Implement logic to send an SMS notification
        echo "SMS sent to {$data['phone']} with message: {$data['message']}";
    }
}
