<?php

namespace App\Services\Notifications;

use App\Interfaces\NotificationInterface;

class EmailNotification implements NotificationInterface
{
    public function send(array $data): void
    {
        // Implement logic to send an email notification
        echo "Email sent to {$data['email']} with subject: {$data['subject']}";
    }
}
