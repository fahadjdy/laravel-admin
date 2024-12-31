<?php
 
 namespace App\Interfaces;

interface NotificationInterface
{
    /**
     * Send the notification.
     *
     * @param array $data
     * @return void
     */
    public function send(array $data): void;
}