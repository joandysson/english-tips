<?php

namespace App\Service;

use App\Models\Contact;
use App\Repository\NotificationRepository;

class ContactService
{

    private Contact $contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }

    public function create(array $data)
    {
        $created = $this->contact->create([
            'name' => $data['name'],
            'email' =>  $data['email'],
            'comment' => $data['comment'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if (!$created || empty($created)) {
            return $created;
        }

        $html = view('contact', [
            'name' => $data['name'],
            'email' => $data['email'],
            'comment' => nl2br($data['comment'])
        ], true);

        $recipientEmail = getenv('NOTIFY_RECIPIENT_EMAIL') ?: 'contact@toolz.at';
        $recipientName = getenv('NOTIFY_RECIPIENT_NAME') ?: 'Admin';

        $payload = [
            'notifications' => [
                [
                    'subject' => sprintf('Contact: English Tips from %s', $data['name']),
                    'recipients' => [
                        [
                            'email' => $recipientEmail,
                            'name' => $recipientName,
                        ]
                    ],
                    'alt_message' => '',
                    'message' => $html,
                ]
            ],
            'config' => [
                'name' => getenv('EMAIL_NAME') ?: 'English Tips',
                'username' => getenv('EMAIL_USERNAME'),
                'password' => getenv('EMAIL_PASSWORD')
            ]
        ];

        (new NotificationRepository())->create($payload);

        return $created;
    }
}
