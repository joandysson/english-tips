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
            $data = [
                'email' => $email,
                'name' => $user,
                // Any other fields can be added by callers as needed
            ];
            return $this->notificationRepository->create($data, $message);
        } catch (Throwable) {
        }
    }
}
