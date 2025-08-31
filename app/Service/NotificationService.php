<?php

namespace App\Service;

use App\Repository\NotificationRepository;
use Throwable;

class NotificationService
{

    private NotificationRepository $notificationRepository;

    public function __construct()
    {
        $this->notificationRepository = new NotificationRepository();
    }

    public function create(string $email, string $user, string $message)
    {
        try {
            return $this->notificationRepository->create($email, $user, $message);
        } catch (Throwable) {
        }
    }
}

