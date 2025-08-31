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

    public function create(array $data, string $message): mixed
    {
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $body = [
            'channel' => self::CHANNEL,
            'data' => [
                'notifications' => [
                    [
                        'subject' => sprintf('Contact: English Tips from %s', $data['name']),
                        'recipients' => [
                            [
                                'email' => getenv('NOTIFY_RECIPIENT_EMAIL'),
                                'name' => getenv('NOTIFY_RECIPIENT_NAME'),
                            ]
                        ],
                        'alt_message' => '',
                        'message' => $message,
                    ]
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
