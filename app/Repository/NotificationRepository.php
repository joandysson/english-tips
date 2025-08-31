<?php

namespace App\Repository;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class NotificationRepository
{

    const CHANNEL = 'email';

    private Client $client;

    public function __construct(?Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function create(string $email, string $user, string $message): mixed
    {
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $recipientEmail = getenv('NOTIFY_RECIPIENT_EMAIL') ?: 'contact@toolz.at';
        $recipientName = getenv('NOTIFY_RECIPIENT_NAME') ?: 'Admin';

        $body = [
            'channel' => self::CHANNEL,
            'data' => [
                'notifications' => [
                    [
                        'subject' => sprintf('Contact: English Tips from %s', $user),
                        'recipients' => [
                            [
                                'email' => $recipientEmail,
                                'name' => $recipientName,
                            ]
                        ],
                        'alt_message' => '',
                        'message' => $message,
                    ]
                ],
                'config' => [
                    'name' => getenv('EMAIL_NAME') ?: 'English Tips',
                    'username' => getenv('EMAIL_USERNAME'),
                    'password' => getenv('EMAIL_PASSWORD')
                ]
            ],
        ];

        $baseUrl = getenv('NOTIFY_API');
        $url = rtrim((string) $baseUrl, '/') . '/api/v1/notify';
        $request = new Request('POST', $url, $headers, json_encode($body));
        $res = $this->client->sendAsync($request)->wait();
        return $res->getBody()->getContents();
    }

}
